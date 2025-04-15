<?php 

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show(Request $request)
{
    $user = Auth::user();

    if (empty($user->address)) {
        return redirect()->route('profile')->with('error', 'Vui lòng cập nhật địa chỉ trước khi đặt hàng.');
    }

    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart')->with('error', 'Không có sản phẩm nào trong giỏ hàng!');
    }

    $selectedProducts = json_decode($request->input('selected_products'), true);

    $checkoutItems = [];
    $total = 0;

    if ($selectedProducts) {
        foreach ($selectedProducts as $selected) {
            $cartKey = $selected['cartKey'];
            $quantity = (int)$selected['quantity'];

            if (isset($cart[$cartKey])) {
                $item = $cart[$cartKey];
                $item['quantity'] = $quantity;
                $item['total_price'] = $quantity * $item['price'];
                $checkoutItems[] = $item;
                $total += $item['total_price'];
            }
        }
    }

    // 👉 Thiết lập phí ship: mặc định 20k, miễn phí nếu đơn >= 300k
    $shippingFee = $total >= 300000 ? 0 : 20000;

    // Lưu vào session để sử dụng sau
    session(['checkout_items' => $checkoutItems]);

    return view('client.pages.checkout-confirm', compact(
        'checkoutItems', 'total', 'user', 'shippingFee'
    ));
}


public function updateQty(Request $request)
{
    $index = $request->input('index');
    $quantity = (int) $request->input('quantity');

    $checkoutItems = session('checkout_items', []);

    if (!isset($checkoutItems[$index])) {
        return response()->json([
            'success' => false,
            'message' => 'Sản phẩm không tồn tại.'
        ]);
    }

    $item = $checkoutItems[$index];

    // Lấy biến thể để kiểm tra tồn kho
    $variant = \App\Models\ProductVariant::where('product_id', $item['product_id'])
        ->whereHas('color', fn($q) => $q->where('color_name', $item['color']))
        ->whereHas('size', fn($q) => $q->where('size_name', $item['size']))
        ->first();

    if (!$variant) {
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy biến thể sản phẩm.',
            'current_qty' => $item['quantity']
        ]);
    }

    if ($quantity > $variant->stock_quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Sản phẩm còn ' . $variant->stock_quantity . ' sản phẩm.',
            'current_qty' => $item['quantity']
        ]);
    }

    // Cập nhật lại số lượng và tổng tiền item
    $checkoutItems[$index]['quantity'] = $quantity;
    $checkoutItems[$index]['total_price'] = $quantity * $item['price'];

    session(['checkout_items' => $checkoutItems]);

    $total = array_sum(array_column($checkoutItems, 'total_price'));

    return response()->json([
        'success' => true,
        'item_total' => number_format($checkoutItems[$index]['total_price'], 0, ',', '.'),
        'total' => number_format($total, 0, ',', '.')
    ]);
}



    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cod,vnpay',
        ]);

        $user = Auth::user();
        $checkoutItems = session('checkout_items', []);

        if (!$checkoutItems) {
            return redirect()->route('cart')->with('error', 'Không có sản phẩm nào trong giỏ hàng!');
        }

        try {
            $orderCode = 'OD' . strtoupper(Str::random(8));

            $order = Order::create([
                'order_code' => $orderCode,
                'user_id' => $user->id,
                'payment_method' => $request->payment_method,
                'status' => 'processing',
            ]);

            foreach ($checkoutItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'color' => $item['color'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget(['checkout_items', 'cart']);

            return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');

        } catch (\Exception $e) {
            Log::error("Lỗi khi đặt hàng: " . $e->getMessage());
            return redirect()->route('checkout.show')->with('error', 'Lỗi khi đặt hàng, vui lòng thử lại!');
        }
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_Amount = $request->input('vnp_Amount') / 100;

        Log::info("VNPay Callback - Session Data: ", session()->all());

        $checkoutItems = session('checkout_items', []);
        $user = Auth::user();

        if ($vnp_ResponseCode == "00") {
            if (!$checkoutItems || !$user) {
                return redirect()->route('cart')->with('error', "Không tìm thấy dữ liệu đơn hàng trong phiên làm việc!");
            }

            $orderCode = 'OD' . strtoupper(Str::random(8));

            $order = Order::create([
                'order_code' => $vnp_TxnRef,
                'user_id' => $user->id,
                'payment_method' => 'vnpay',
                'status' => 'completed',
            ]);

            foreach ($checkoutItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'color' => $item['color'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget(['checkout_items', 'cart']);

            return redirect()->route('orders.index')->with('success', 'Thanh toán thành công. Mã đơn hàng: ' . $order->order_code);
        } else {
            return redirect()->route('checkout.show')->with('error', 'Thanh toán thất bại. Mã lỗi: ' . $vnp_ResponseCode);
        }
    }

    public function retry(Order $order)
    {
        // Kiểm tra quyền hoặc trạng thái đơn nếu cần
    
        // Lấy lại các sản phẩm trong đơn để hiển thị lại
        $items = $order->items()->with('variant')->get();
    
        // Truyền sang view checkout-confirm.blade.php
        return view('client.pages.checkout-confirm', [
            'order' => $order,
            'items' => $items
        ]);
    }
    

    

}