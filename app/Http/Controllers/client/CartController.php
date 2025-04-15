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
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
    }

    // ✅ Đã đăng nhập mới xử lý
    $productId = $request->input('product_id');
    $variantId = $request->input('variant_id');
    $quantity = (int)$request->input('quantity', 1);

    // Lấy thông tin biến thể (color, size, giá,...)
    $variant = ProductVariant::with(['product', 'color', 'size'])->findOrFail($variantId);

    $cart = session()->get('cart', []);

    $cartKey = $productId . '-' . $variantId;

    if (isset($cart[$cartKey])) {
        $cart[$cartKey]['quantity'] += $quantity;
    } else {
        $cart[$cartKey] = [
            'product_id' => $productId,
            'variant_id' => $variantId,
            'name' => $variant->product->name,
            'price' => $variant->price,
            'quantity' => $quantity,
            'image' => $variant->product->image, // nếu có
            'color' => $variant->color->color_name,
            'size' => $variant->size->size_name
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart')->with('success', 'Đã thêm vào giỏ hàng!');
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
    $cartKey = $request->input('cartKey');
    $quantity = (int) $request->input('quantity');
    $cart = session()->get('cart', []);

    if (!isset($cart[$cartKey])) {
        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.']);
    }

    $variantId = $cart[$cartKey]['variant_id'] ?? null;
    $variant = \App\Models\ProductVariant::find($variantId);

    if ($variant && $quantity > $variant->stock_quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Sản phẩm còn ' . $variant->stock_quantity . ' sản phẩm.',
            'current_quantity' => $cart[$cartKey]['quantity'] // để reset lại input nếu cần
        ]);
    }

    // ✅ Cập nhật số lượng
    $cart[$cartKey]['quantity'] = $quantity;
    session()->put('cart', $cart);

    $itemTotal = number_format($cart[$cartKey]['price'] * $quantity, 0, ',', '.');
    $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

    return response()->json([
        'success' => true,
        'item_total' => $itemTotal,
        'total_price' => number_format($totalPrice, 0, ',', '.')
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


    public function recheckCart(Request $request)
{
    $orderId = $request->input('order_id');
    $order = Order::with('items')->findOrFail($orderId);

    $user = Auth::user();

    $checkoutItems = $order->items->map(function ($item) {
        return [
            'product_id' => $item->product_id,
            'name' => $item->product_name,
            'image' => optional($item->product)->image ?? 'default.png',
            'color' => $item->color,
            'size' => $item->size,
            'quantity' => $item->quantity,
            'price' => $item->price,
            'total_price' => $item->price * $item->quantity,
        ];
    })->toArray();

    $total = array_sum(array_column($checkoutItems, 'total_price'));
    $shippingFee = $total >= 300000 ? 0 : 20000;

    session([
        'checkout_items' => $checkoutItems,
        'order_code' => $order->order_code,
        'retry_payment' => true,
        'retry_order_id' => $order->id,
    ]);

    return view('client.pages.checkout-confirm', [
        'checkoutItems' => $checkoutItems,
        'total' => $total,
        'shippingFee' => $shippingFee,
        'user' => $user,
    ]);
}




public function checkStock(Request $request)
{
    $selected = $request->input('selected_products', []);
    $cart = session('cart', []);
    $outOfStock = [];

    foreach ($selected as $item) {
        $cartKey = $item['cartKey'];
        $quantity = (int) $item['quantity'];

        if (!isset($cart[$cartKey])) continue;

        $variantId = $cart[$cartKey]['variant_id'];
        $variant = \App\Models\ProductVariant::find($variantId);

        if (!$variant || $variant->stock_quantity < $quantity) {
            $outOfStock[] = $cart[$cartKey]['name'] . " (" . $cart[$cartKey]['color'] . " - " . $cart[$cartKey]['size'] . ")";
        }
    }

    if (count($outOfStock) > 0) {
        return response()->json([
            'success' => false,
            'out_of_stock' => $outOfStock
        ]);
    }

    return response()->json(['success' => true]);
}



}
