<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Hiển thị danh sách Banner.
     */
    public function index()
    {
        $banners = Banner::orderBy('position', 'asc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Hiển thị form tạo mới Banner.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Lưu Banner mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu hình ảnh
        $imagePath = $request->file('image')->store('banners', 'public');

        // Tạo banner mới
        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'position' => $request->position,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được tạo thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa Banner.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Cập nhật Banner trong database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        // Xử lý hình ảnh nếu có thay đổi
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image = $imagePath;
        }

        // Cập nhật dữ liệu
        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được cập nhật thành công!');
    }

    /**
     * Xóa Banner khỏi database.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Xóa ảnh trong storage
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        // Xóa Banner
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được xóa thành công!');
    }
}
