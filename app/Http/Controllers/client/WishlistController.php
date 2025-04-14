<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product; // Model sản phẩm
use App\Models\Wishlist; // Model Wishlist (giả sử bạn có bảng lưu danh sách yêu thích)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductVariant;

class WishlistController extends Controller
{
    public function wishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem danh sách yêu thích.');
        }

        $user = Auth::user();
        $wishlistItems = Wishlist::where('user_id', $user->id)
            ->with(['product', 'variant'])
            ->get();

        if ($wishlistItems->isEmpty()) {
            return view('client.pages.wishlist', ['wishlistItems' => null]);
        }

        return view('client.pages.wishlist', compact('wishlistItems'));
    }

    public function addToWishlist(Request $request, $productId)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập để thêm vào yêu thích.']);
        }

        $user = Auth::user();
        $variantId = $request->input('variant_id'); // Lấy variant_id từ request
        $product = Product::find($productId);
        $variant = $variantId ? ProductVariant::find($variantId) : null;
        $price = $variant ? $variant->price : $product->price; // Lấy giá từ variant hoặc product

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }

        // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích chưa (bao gồm variant_id)
        $existingWishlist = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->where('variant_id', $variantId)
            ->first();

        if ($existingWishlist) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm đã có trong danh sách yêu thích.']);
        }

        // Thêm sản phẩm vào danh sách yêu thích
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'variant_id' => $variantId,
            'price' => $price,
        ]);

        return response()->json(['success' => true, 'message' => 'Sản phẩm đã được thêm vào yêu thích.']);
    }

    // (Tùy chọn) Xóa sản phẩm khỏi danh sách yêu thích
    public function removeFromWishlist($productId)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập để xóa khỏi yêu thích.']);
        }

        $user = Auth::user();
        Wishlist::where('user_id', $user->id)->where('product_id', $productId)->delete();

        return response()->json(['success' => true, 'message' => 'Sản phẩm đã được xóa khỏi yêu thích.']);
    }
}
