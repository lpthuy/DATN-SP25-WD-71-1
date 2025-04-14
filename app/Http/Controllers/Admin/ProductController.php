<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'variants.size', 'variants.color']);
    
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            // Tìm kiếm theo tên sản phẩm hoặc tên danh mục
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                  ->orWhereHas('category', function($query) use ($keyword) {
                      $query->where('name', 'like', '%' . $keyword . '%');
                  });
            });
        }
    
        $products = $query->latest()->paginate(10);
        $colors = Color::all();
        $sizes = Size::all();
    
        return view('admin.products.index', compact('products', 'colors', 'sizes'));
    }
    


    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'variants'    => 'required|array|min:1',
        ]);

        $data = $request->except(['images', 'variants']);
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
            $data['image'] = implode(',', $imagePaths);
        }

        $product = Product::create($data);

        $variants = [];
        foreach ($request->variants as $variant) {
            if (!isset($variant['color_id'], $variant['size_id'], $variant['price'])) {
                continue;
            }

            $variants[] = [
                'product_id'     => $product->id,
                'size_id'        => $variant['size_id'],
                'color_id'       => $variant['color_id'],
                'price'          => (float) $variant['price'],
                'discount_price' => $variant['discount_price'] ?? 0,
                'stock_quantity' => $variant['stock_quantity'] ?? 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        if (!empty($variants)) {
            ProductVariant::insert($variants);
        }

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.edit', compact('product', 'categories', 'colors', 'sizes'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'variants.*.color_id' => 'required|exists:colors,id',
            'variants.*.size_id' => 'required|exists:sizes,id',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.discount_price' => 'nullable|numeric|min:0',
            'variants.*.stock_quantity' => 'required|integer|min:1',
        ]);
    
        $product->update($request->only(['name', 'category_id', 'description']));
    
        // Cập nhật hình ảnh
        if ($request->hasFile('images')) {
            if ($product->image) {
                foreach (explode(',', $product->image) as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
    
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $newImages[] = $image->store('products', 'public');
            }
            $product->update(['image' => implode(',', $newImages)]);
        }
    
        // Xóa biến thể được đánh dấu xóa
        if ($request->deleted_variants) {
            $variantIds = explode(',', $request->deleted_variants);
            ProductVariant::whereIn('id', $variantIds)->delete();
        }
    
        // Xử lý cập nhật và thêm mới biến thể
        foreach ($request->variants as $variantData) {
            if (!empty($variantData['id'])) {
                ProductVariant::where('id', $variantData['id'])->update([
                    'color_id' => $variantData['color_id'],
                    'size_id' => $variantData['size_id'],
                    'price' => $variantData['price'],
                    'discount_price' => $variantData['discount_price'] ?? null,
                    'stock_quantity' => $variantData['stock_quantity'],
                ]);
            } else {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'color_id' => $variantData['color_id'],
                    'size_id' => $variantData['size_id'],
                    'price' => $variantData['price'],
                    'discount_price' => $variantData['discount_price'] ?? null,
                    'stock_quantity' => $variantData['stock_quantity'],
                ]);
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
    public function destroy(Product $product)
{
    // Xóa ảnh nếu có
    if ($product->image) {
        $images = explode(',', $product->image);
        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }
    }

    // Xóa các biến thể sản phẩm
    $product->variants()->delete();

    // ❗ Không xóa OrderItem để giữ thông tin hóa đơn

    // ❗ Kiểm tra và xóa sản phẩm ra khỏi session giỏ hàng (nếu tồn tại)
    $cart = session()->get('cart', []);
    $cart = array_filter($cart, function ($item) use ($product) {
        return $item['product_id'] != $product->id;
    });

    session()->put('cart', $cart); // Ghi đè lại giỏ hàng đã lọc

    // Xóa chính sản phẩm
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa và loại khỏi giỏ hàng!');
}

public function toggleActive($id)
{
    $product = Product::findOrFail($id);
    $product->is_active = !$product->is_active;
    $product->save();

    return back()->with('success', 'Cập nhật trạng thái sản phẩm thành công!');
}


}
