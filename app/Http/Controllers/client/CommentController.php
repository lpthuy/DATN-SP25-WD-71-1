<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment
     */
    public function store(Request $request, $productId)
{
    // Validate request data
    $validated = $request->validate([
        'content' => 'required|string|max:1000',
        'rating' => 'required|integer|between:1,5',
        'name' => Auth::check() ? 'nullable' : 'required|string|max:60',
        'email' => Auth::check() ? 'nullable|email|max:100' : 'required|email|max:100',
    ]);

    try {
        // Check if product exists
        $product = Product::find($productId);
        if (!$product) {
            return back()->with('error', 'Sản phẩm không tồn tại');
        }

        // Check if the user has purchased this product and the order status is 'Đã giao thành công'
        $userId = Auth::id();
        $order = Order::where('user_id', $userId)
                      ->where('status', 'đã nhận hàng')  // Kiểm tra trạng thái 'Đã giao thành công'
                      ->whereHas('items', function($query) use ($productId) {
                          $query->where('product_id', $productId);  // Kiểm tra sản phẩm trong đơn hàng
                      })
                      ->first();

        if (!$order) {
            return back()->with('error', 'Bạn phải mua sản phẩm này và đơn hàng phải đã giao thành công trước khi có thể bình luận.');
        }

        // Create new comment
        $comment = Comment::create([
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'product_id' => $productId,
            'user_id' => $userId,
            'name' => Auth::check() ? null : $validated['name'],
            'email' => Auth::check() ? null : $validated['email'],
            'is_visible' => true // Có thể thay đổi thành false nếu cần kiểm duyệt
        ]);

        // Cập nhật rating trung bình cho sản phẩm
        $this->updateProductAverageRating($productId);

        return back()->with('success', 'Đánh giá của bạn đã được gửi thành công!');

    } catch (\Exception $e) {
        return back()->with('error', 'Có lỗi xảy ra: '.$e->getMessage());
    }
}

    /**
     * Update product's average rating
     */
    protected function updateProductAverageRating($productId)
    {
        $averageRating = Comment::where('product_id', $productId)
            ->where('is_visible', true)
            ->avg('rating');

        Product::where('id', $productId)
            ->update(['average_rating' => $averageRating]);
    }
}