<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Hiển thị danh sách kích thước.
     */
    public function index()
    {
        $sizes = Size::paginate(10);
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Hiển thị form thêm kích thước.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Lưu kích thước mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size_name' => 'required|string|max:50|unique:sizes',
        ]);

        Size::create($request->all());

        return redirect()->route('sizes.index')->with('success', 'Kích thước đã được thêm thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa kích thước.
     */
    public function edit(Size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Cập nhật kích thước trong database.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'size_name' => 'required|string|max:50|unique:sizes,size_name,' . $size->id,
        ]);

        $size->update($request->all());

        return redirect()->route('sizes.index')->with('success', 'Kích thước đã được cập nhật!');
    }

    /**
     * Xóa kích thước.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('sizes.index')->with('success', 'Kích thước đã bị xóa!');
    }
}
