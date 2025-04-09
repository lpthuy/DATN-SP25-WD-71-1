<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = session()->get('cart', []);
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));

        return view('client.pages.cart', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'color_id' => 'required|exists:colors,id',
        'size_id' => 'required|exists:sizes,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);
    $variant = ProductVariant::where('product_id', $product->id)
                            ->where('color_id', $request->color_id)
                            ->where('size_id', $request->size_id)
                            ->first();

    if (!$variant) {
        return redirect()->back()->with('error', 'Sản phẩm với màu sắc và size này không tồn tại.');
    }

    $cart = session()->get('cart', []);
    $cartKey = $product->id . '-' . $variant->id;

    // ✅ Sửa tại đây: Ghi đè đúng số lượng mới nhập
    $cart[$cartKey] = [
        'product_id' => $product->id,
        'variant_id' => $variant->id,
        'name' => $product->name,
        'color' => $variant->color->color_name,
        'size' => $variant->size->size_name,
        'price' => $variant->discount_price ?? $variant->price,
        'quantity' => $request->quantity,
        'image' => $product->image
    ];

    session()->put('cart', $cart);

    // Tính tổng tiền nếu cần dùng
    $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

    return redirect()->route('cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
}


public function removeItem(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->cartKey])) {
            unset($cart[$request->cartKey]);
            session()->put('cart', $cart);
        }

        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return response()->json([
            'success' => true,
            'total_price' => number_format($totalPrice, 0, ',', '.'),
            'totalItems' => count($cart)
        ]);
    }


    public function updateCart(Request $request)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$request->cartKey])) {
        $cart[$request->cartKey]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
    }

    // Tính tổng tiền
    $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    $itemTotal = number_format($cart[$request->cartKey]['price'] * $cart[$request->cartKey]['quantity'], 0, ',', '.');

    return response()->json([
        'success' => true,
        'total_price' => number_format($totalPrice, 0, ',', '.'),
        'item_total' => $itemTotal
    ]);
}
public function countCart()
{
    $cartItems = session()->get('cart', []);
    $validCartItems = [];

    foreach ($cartItems as $key => $item) {
        $product = \App\Models\Product::find($item['product_id']);
        $variant = \App\Models\ProductVariant::find($item['variant_id']);

        // ✅ Chỉ giữ lại sản phẩm nếu vẫn còn tồn tại & đang được hiển thị (is_active = true)
        if ($product && $variant && $product->is_active) {
            // Cập nhật lại tên sản phẩm nếu đã bị sửa trong DB
            $item['name'] = $product->name;

            $validCartItems[$key] = $item;
        }
    }

    // ✅ Cập nhật lại session cart
    session()->put('cart', $validCartItems);

    return response()->json(['cart_count' => count($validCartItems)]);
}




public function index()
    {
        // Lấy dữ liệu giỏ hàng từ session
        $cartItems = session('cart', []);

        // Trả về view giỏ hàng
        return view('client.pages.cart', compact('cartItems'));
    }


    // CartController.php
    public function recheckCart(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::with('items')->findOrFail($orderId);
    
        // Map lại các item về dạng mà view checkout-confirm sử dụng
        $checkoutItems = $order->items->map(function ($item) {
            $totalPrice = $item->price * $item->quantity;
            return [
                'product_id' => $item->product_id,
                'name' => $item->product_name,
                'color' => $item->color,
                'size' => $item->size,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total_price' => $totalPrice,
            ];
        })->toArray();
    
        $total = array_sum(array_column($checkoutItems, 'total_price'));
    
        // Lưu vào session
        session([
            'checkout_items' => $checkoutItems,
            'order_code' => $order->order_code,
        ]);
    
        return view('client.pages.checkout-confirm', [
            'checkoutItems' => $checkoutItems,
            'total' => $total,
            'user' => Auth::user(),
        ]);
    }
    

}
