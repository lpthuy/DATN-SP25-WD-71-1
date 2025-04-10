<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    // Hiển thị danh sách phương thức thanh toán
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('admin.payment_methods.index', compact('paymentMethods'));
    }

    // Hiển thị form thêm phương thức thanh toán
    public function create()
    {
        return view('admin.payment_methods.create');
    }

    // Lưu phương thức thanh toán mới
    public function store(Request $request)
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',  // Kiểm tra file hình ảnh
        ]);

        // Lưu hình ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('payment_images', 'public');
        } else {
            $imagePath = null;
        }

        PaymentMethod::create([
            'method_name' => $request->method_name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('payment_methods.index')->with('success', 'Phương thức thanh toán đã được thêm!');
    }

    // Hiển thị form chỉnh sửa phương thức thanh toán
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.payment_methods.edit', compact('paymentMethod'));
    }

    // Cập nhật phương thức thanh toán
    public function update(Request $request, $id)
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',  // Kiểm tra file hình ảnh
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);

        // Cập nhật hình ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa hình cũ nếu có
            if ($paymentMethod->image_path) {
                Storage::delete('public/' . $paymentMethod->image_path);
            }

            $imagePath = $request->file('image')->store('payment_images', 'public');
        } else {
            $imagePath = $paymentMethod->image_path;
        }

        $paymentMethod->update([
            'method_name' => $request->method_name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('payment_methods.index')->with('success', 'Phương thức thanh toán đã được cập nhật!');
    }

    // Xóa phương thức thanh toán
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($paymentMethod->image_path) {
            Storage::delete('public/' . $paymentMethod->image_path);
        }

        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')->with('success', 'Phương thức thanh toán đã được xóa!');
    }
}
