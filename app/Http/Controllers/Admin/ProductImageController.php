<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Hiển thị danh sách tất cả hình ảnh sản phẩm.
     */
    public function index()
    {
        $images = ProductImage::with('product')->paginate(10);
        return view('admin.products_images.index', compact('images'));
    }

    /**
     * Hiển thị form thêm hình ảnh sản phẩm.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.products_images.create', compact('products'));
    }

    /**
     * Lưu hình ảnh mới vào database và thư mục lưu trữ.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu hình ảnh vào storage
        $imagePath = $request->file('image')->store('product_images', 'public');

        // Lưu thông tin hình ảnh vào database
        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image_url = $imagePath;
        $productImage->save();

        return redirect()->route('products_images.index')->with('success', 'Hình ảnh đã được thêm thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa hình ảnh.
     */
    public function edit($id)
    {
        $product_image = ProductImage::findOrFail($id);
        $products = Product::all();

        return view('admin.products_images.edit', compact('product_image', 'products'));
    }

    /**
     * Cập nhật hình ảnh trong database và thư mục lưu trữ.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $productImage = ProductImage::findOrFail($id);

        // Kiểm tra nếu có ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($productImage->image_url && Storage::disk('public')->exists($productImage->image_url)) {
                Storage::disk('public')->delete($productImage->image_url);
            }

            // Lưu ảnh mới vào storage
            $imagePath = $request->file('image')->store('product_images', 'public');

            // Cập nhật đường dẫn ảnh mới vào database
            $productImage->update([
                'product_id' => $request->product_id,
                'image_url' => $imagePath,
            ]);
        } else {
            // Nếu không có ảnh mới, chỉ cập nhật product_id
            $productImage->update([
                'product_id' => $request->product_id,
            ]);
        }

        return redirect()->route('products_images.index')->with('success', 'Hình ảnh đã được cập nhật thành công!');
    }

    /**
     * Xóa hình ảnh sản phẩm khỏi database và thư mục lưu trữ.
     */
    public function destroy(Request $request)
{
    try {
        // Kiểm tra nếu có chọn ảnh để xóa
        if ($request->has('image_ids')) {
            $request->validate([
                'image_ids' => 'required|array',
                'image_ids.*' => 'exists:product_images,id',
            ]);

            // Xóa từng ảnh được chọn
            foreach ($request->image_ids as $imageId) {
                $image = ProductImage::findOrFail($imageId);
                
                // Xóa ảnh khỏi storage
                if (Storage::disk('public')->exists($image->image_url)) {
                    Storage::disk('public')->delete($image->image_url);
                }

                // Xóa ảnh khỏi database
                $image->delete();
            }

            return redirect()->route('products_images.index')->with('success', 'Hình ảnh được chọn đã bị xóa!');
        }

        return redirect()->route('products_images.index')->with('error', 'Vui lòng chọn ít nhất một hình ảnh để xóa.');
    } catch (\Exception $e) {
        return redirect()->route('products_images.index')->with('error', 'Lỗi khi xóa hình ảnh: ' . $e->getMessage());
    }
}

}
