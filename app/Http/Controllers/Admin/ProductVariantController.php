<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductImage;

class ProductVariantController extends Controller
{
    /**
     * Hiển thị danh sách biến thể sản phẩm.
     */
    public function index(Request $request)
    {
        $productId = $request->query('product'); // Lấy product_id từ URL
        $product = Product::find($productId); // Tìm sản phẩm từ database
    
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại.');
        }
    
        $variants = ProductVariant::with(['size', 'color'])
            ->where('product_id', $productId)
            ->get()
            ->groupBy('color_id');
    
        $productImages = ProductImage::where('product_id', $productId)->get();
    
        return view('admin.product_variants.index', compact('product', 'variants', 'productImages'));
    }

    /**
     * Thêm biến thể mới
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'variants' => 'required|array',
            ]);

            $product = Product::findOrFail($request->product_id);
            $price = $product->price;

            foreach ($request->variants as $size_id => $colors) {
                foreach ($colors as $color_id => $variant) {
                    if (!empty($variant['selected']) && !empty($variant['stock_quantity'])) {
                        ProductVariant::updateOrCreate(
                            [
                                'product_id' => $request->product_id,
                                'size_id' => $size_id,
                                'color_id' => $color_id,
                            ],
                            [
                                'stock_quantity' => $variant['stock_quantity'],
                                'price' => $variant['price'] ?? $price,
                                'discount_price' => $variant['discount_price'] ?? 0,
                            ]
                        );
                    }
                }
            }

            if ($request->ajax()) {
                return response()->json(['message' => 'Biến thể đã được thêm thành công!']);
            }

            return redirect()->back()->with('success', 'Biến thể sản phẩm đã được thêm thành công!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi khi thêm biến thể: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Cập nhật biến thể
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'variants' => 'required|array',
            ]);

            $product = Product::findOrFail($request->product_id);
            $price = $product->price;

            foreach ($request->variants as $size_id => $colors) {
                foreach ($colors as $color_id => $variant) {
                    if (!empty($variant['selected']) && !empty($variant['stock_quantity'])) {
                        ProductVariant::updateOrCreate(
                            [
                                'product_id' => $request->product_id,
                                'size_id' => $size_id,
                                'color_id' => $color_id,
                            ],
                            [
                                'stock_quantity' => $variant['stock_quantity'],
                                'price' => $variant['price'] ?? $price,
                                'discount_price' => $variant['discount_price'] ?? 0,
                            ]
                        );
                    } else {
                        // Nếu bỏ chọn thì xóa biến thể đó
                        ProductVariant::where([
                            'product_id' => $request->product_id,
                            'size_id' => $size_id,
                            'color_id' => $color_id,
                        ])->delete();
                    }
                }
            }

            if ($request->ajax()) {
                return response()->json(['message' => 'Cập nhật biến thể thành công!']);
            }

            return redirect()->back()->with('success', 'Cập nhật biến thể thành công!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi khi cập nhật: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Xóa biến thể sản phẩm
     */
    public function destroy(Request $request, $id)
    {
        try {
            $variant = ProductVariant::findOrFail($id);

            if ($request->has('size_ids')) {
                $request->validate([
                    'size_ids' => 'required|array',
                    'size_ids.*' => 'exists:sizes,id',
                ]);

                ProductVariant::where('product_id', $variant->product_id)
                    ->whereIn('size_id', $request->size_ids)
                    ->where('color_id', $variant->color_id)
                    ->delete();

                return response()->json(['message' => 'Kích thước đã được xóa thành công!']);
            }

            $variant->delete();

            if ($request->ajax()) {
                return response()->json(['message' => 'Xóa biến thể thành công!']);
            }

            return redirect()->back()->with('success', 'Biến thể đã bị xóa thành công!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi khi xóa: ' . $e->getMessage()], 500);
        }
    }
}
