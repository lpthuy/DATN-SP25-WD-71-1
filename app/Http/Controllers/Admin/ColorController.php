<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Hiển thị danh sách màu sắc.
     */
    public function index()
    {
        $colors = Color::paginate(10);
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Hiển thị form thêm màu sắc.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Lưu màu sắc mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'color_name' => 'required|string|max:50|unique:colors',
            'color_code' => 'required|string|size:7|unique:colors', // Mã màu HEX (VD: #FF0000)
        ]);

        Color::create($request->all());

        return redirect()->route('colors.index')->with('success', 'Màu sắc đã được thêm thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa màu sắc.
     */
    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    /**
     * Cập nhật màu sắc trong database.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'color_name' => 'required|string|max:50|unique:colors,color_name,' . $color->id,
            'color_code' => 'required|string|size:7|unique:colors,color_code,' . $color->id,
        ]);

        $color->update($request->all());

        return redirect()->route('colors.index')->with('success', 'Màu sắc đã được cập nhật!');
    }

    /**
     * Xóa màu sắc.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Màu sắc đã bị xóa!');
    }
}
