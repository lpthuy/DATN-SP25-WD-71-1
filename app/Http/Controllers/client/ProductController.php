<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show($id)
    {
        // Lấy sản phẩm theo ID kèm theo danh sách kích thước và màu sắc
        $product = Product::with(['sizes', 'colors'])->findOrFail($id);

        $comments = $product->comments()->get();

        return view('client.products.detail', compact('product', 'comments'));
    }

    public function category($slug)
    {
        $category = Category::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::slug($slug)])
            ->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('is_active', 1)
            ->paginate(12);

            return view('client.pages.category-products', compact('category', 'products'));

    }
}
