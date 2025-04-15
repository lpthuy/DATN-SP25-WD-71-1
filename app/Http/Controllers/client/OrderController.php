<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; // Thêm dòng này ở đầu file
use App\Mail\OrderSuccessMail; // Thêm dòng này nếu đã tạo Mailable
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{

    // OrderController.php
    public function markAsReturned(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validate
        $request->validate([
            'return_reason' => 'required|string',
            'return_media' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:10240'
        ]);

        // Upload file
        $filePath = null;
        if ($request->hasFile('return_media')) {
            $file = $request->file('return_media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('returns', $fileName, 'public');
        }

        // ✅ Cập nhật lý do hoàn hàng và media
        $order->return_reason = $request->input('return_reason');
        $order->return_media = $filePath;
        $order->status = 'Đã hoàn hàng'; // dùng status tiếng Anh để đồng nhất
        $order->save();

        // ✅ Trả lại số lượng về kho dựa trên product_id + size + color
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        foreach ($orderItems as $item) {
            $sizeId = Size::where('size_name', trim(strtolower($item->size)))->value('id');
            $colorId = Color::where('color_name', trim(ucfirst(strtolower($item->color))))->value('id');

            if (!$sizeId || !$colorId) {
                \Log::warning("Không tìm thấy size hoặc color cho OrderItem #{$item->id} - size: {$item->size}, color: {$item->color}");
                continue;
            }

            $variant = ProductVariant::where('product_id', $item->product_id)
                ->where('size_id', $sizeId)
                ->where('color_id', $colorId)
                ->first();

            if ($variant) {
                $variant->stock_quantity += $item->quantity;
                $variant->save();
            } else {
                \Log::warning("Không tìm thấy biến thể cho OrderItem #{$item->id} (product_id={$item->product_id}, size_id={$sizeId}, color_id={$colorId})");
            }
        }

        return redirect()->route('order')->with('success', '📦 Đã gửi yêu cầu hoàn hàng và trả số lượng về kho.');
    }




    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $checkoutItems = session('checkout_items', []);
            $retryOrderId = session('retry_order_id');
            $isRetry = session('retry_payment', false);

            if (!$checkoutItems || !$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không tìm thấy giỏ hàng hoặc chưa đăng nhập!'
                ], 400);
            }

            $promotionCode = session('promo_code');
            $discount = session('promo_discount', 0);
            $shippingFee = session('shipping_fee', 0);
            $subtotal = collect($checkoutItems)->sum(fn($item) => $item['quantity'] * $item['price']);
            $finalTotal = $subtotal + $shippingFee - $discount;

            if ($isRetry && $retryOrderId) {
                // 👉 Nếu là thanh toán lại
                $order = Order::where('id', $retryOrderId)
                    ->where('user_id', $user->id)
                    ->first();

                if (!$order) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Không tìm thấy đơn hàng để thanh toán lại.'
                    ], 404);
                }

                $order->update([
                    'payment_method' => 'cod',
                    'status' => 'processing',
                    'promotion_code' => $promotionCode,
                    'discount' => $discount,
                    'shipping_fee' => $shippingFee,
                ]);

                $order->items()->delete();
            } else {
                // 👉 Tạo đơn hàng mới nếu không phải thanh toán lại
                $orderCode = 'OD' . strtoupper(Str::random(8));
                $order = Order::create([
                    'order_code' => $orderCode,
                    'user_id' => $user->id,
                    'payment_method' => 'cod',
                    'status' => 'processing',
                    'promotion_code' => $promotionCode,
                    'discount' => $discount,
                    'shipping_fee' => $shippingFee,
                ]);
            }

            // ✅ Tạo sản phẩm và trừ kho
            foreach ($checkoutItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['name'],
                    'color' => $item['color'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $sizeId = \App\Models\Size::where('size_name', strtolower(trim($item['size'])))->value('id');
                $colorId = \App\Models\Color::where('color_name', ucfirst(strtolower(trim($item['color']))))->value('id');

                if ($sizeId && $colorId) {
                    $variant = \App\Models\ProductVariant::where('product_id', $item['product_id'])
                        ->where('size_id', $sizeId)
                        ->where('color_id', $colorId)
                        ->first();

                    if ($variant) {
                        $variant->stock_quantity = max(0, $variant->stock_quantity - $item['quantity']);
                        $variant->save();
                    }
                }
            }

            // ✅ Tạo mã QR cho đơn hàng
        try {
            $qrContent = route('orders.track', ['code' => $order->order_code]); // hoặc thay bằng $order->order_code
            $qrFileName = 'qrcodes/order_' . $order->id . '_' . time() . '.png';
            $qrFullPath = storage_path('app/public/' . $qrFileName);

            QrCode::format('png')->size(300)->generate($qrContent, $qrFullPath);

            $order->qr_code_path = 'storage/' . $qrFileName;
            $order->save();
        } catch (\Exception $e) {
            Log::error("❌ Lỗi tạo mã QR: " . $e->getMessage());
        }

            try {
                $order->load('items');
                Mail::to($user->email)->send(new OrderSuccessMail($order));
            } catch (\Exception $e) {
                Log::error('❌ Không gửi được email xác nhận: ' . $e->getMessage());
            }

            // ✅ Xoá sản phẩm đã đặt khỏi giỏ hàng session('cart')
            $cart = session('cart', []);
            foreach ($checkoutItems as $item) {
                if (!empty($item['product_id']) && !empty($item['variant_id'])) {
                    $cartKey = $item['product_id'] . '-' . $item['variant_id'];
                    unset($cart[$cartKey]);
                }
            }
            session()->put('cart', $cart);


            // ✅ Xoá session
            session()->forget([
                'checkout_items',
                'promo_code',
                'promo_discount',
                'shipping_fee',
                'retry_payment',
                'retry_order_id',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Đặt hàng thành công!',
                'order_code' => $order->order_code,
                'redirect' => route('order')
            ], 200);
        } catch (\Throwable $e) {
            Log::error("❌ Lỗi trong quá trình xử lý COD: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi không mong muốn. Vui lòng thử lại.'
            ], 500);
        }
    }








    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('client.pages.order', compact('user', 'orders'));
    }


    public function checkPaymentStatus(Request $request)
    {
        $productId = $request->query('product_id');

        if (!$productId) {
            return response()->json(['error' => 'Thiếu product_id'], 400);
        }

        // Kiểm tra xem có đơn hàng nào với product_id tương ứng hay không
        $order = Order::where('product_id', $productId)->first();

        if (!$order) {
            return response()->json(['error' => 'Không tìm thấy đơn hàng'], 404);
        }

        return response()->json([
            'payment_status' => $order->payment_status,
            'order_code' => $order->order_code
        ]);
    }



    public function show($id)
    {
        $user = Auth::user();

        // Lấy đơn hàng
        $order = Order::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        // Lấy các sản phẩm trong đơn hàng đó
        $items = OrderItem::where('order_id', $order->id)->get();

        return view('client.pages.order_detail', compact('order', 'items'));
    }



    public function received(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Cập nhật trạng thái thành "received"
        $order->status = 'đã nhận hàng';
        $order->save();

        // Nếu là yêu cầu từ form gốc (không JS)
        if ($request->expectsJson()) {
            return response()->json(['status' => 'success']);
        }

        return back()->with('success', 'Đã cập nhật đơn hàng');
    }



    public function markAsReceived($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'đã nhận hàng';
        $order->save();

        return redirect()->back()->with('success', 'Đơn hàng đã được cập nhật là đã nhận');
    }


    public function cancelOrder(Request $request)
    {
        try {
            $orderId = $request->input('order_id');
            $cancelReason = $request->input('cancel_reason');

            $order = Order::with('items')->find($orderId);

            if (!$order) {
                return response()->json(['status' => 'error', 'message' => 'Đơn hàng không tồn tại.']);
            }

            if ($order->status === 'cancelled') {
                return response()->json(['status' => 'error', 'message' => 'Đơn hàng đã bị huỷ trước đó.']);
            }

            if ($order->status !== 'processing') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Chỉ những đơn hàng đang xử lý mới có thể huỷ. Hiện tại đơn hàng đang ở trạng thái: ' . strtoupper($order->status)
                ]);
            }

            // ✅ Trả lại số lượng cho từng sản phẩm (theo product_id + size_name + color_name)
            foreach ($order->items as $item) {
                // Tìm ID của size & color theo tên
                $sizeId = Size::where('size_name', trim(strtolower($item->size)))->value('id');
                $colorId = Color::where('color_name', trim(ucfirst(strtolower($item->color))))->value('id');

                if (!$sizeId || !$colorId) {
                    \Log::warning("Không tìm thấy size hoặc color cho OrderItem #{$item->id} - size: {$item->size}, color: {$item->color}");
                    continue;
                }

                // Tìm biến thể sản phẩm
                $variant = ProductVariant::where('product_id', $item->product_id)
                    ->where('size_id', $sizeId)
                    ->where('color_id', $colorId)
                    ->first();

                if ($variant) {
                    $variant->stock_quantity += $item->quantity;
                    $variant->save();
                } else {
                    \Log::warning("Không tìm thấy biến thể cho OrderItem #{$item->id} (product_id={$item->product_id}, size_id={$sizeId}, color_id={$colorId})");
                }
            }

            $order->status = 'cancelled';
            $order->cancel_reason = $cancelReason;
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Huỷ đơn hàng thành công! Số lượng sản phẩm đã trả về kho.'
            ]);
        } catch (\Throwable $e) {
            \Log::error('Lỗi khi huỷ đơn hàng: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi server: ' . $e->getMessage()
            ], 500);
        }
    }

    public function exportPDF($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $items = OrderItem::where('order_id', $id)->get();

        $pdf = Pdf::loadView('client.pages.pdf', [
            'order' => $order,
            'items' => $items
        ]);

        return $pdf->download("order_{$order->order_code}.pdf");
    }
}
