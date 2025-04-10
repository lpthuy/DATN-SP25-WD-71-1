<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Đã xoá đơn hàng thành công.');
}

    public function index(Request $request)
{
    $query = Order::query();

    if ($search = $request->input('search')) {
        $query->where('order_code', 'like', "%$search%")
              ->orWhere('status', 'like', "%$search%")
              ->orWhere('payment_method', 'like', "%$search%")
              ->orWhere('user_id', $search);
    }

    $orders = $query->latest()->paginate(10);

    return view('admin.orders.index', compact('orders'));
}


    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $order = Order::findOrFail($id);
        $items = OrderItem::where('order_id', $id)->get();
        return view('admin.orders.show', compact('order', 'items'));
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|max:50'
    ]);

    $order = Order::findOrFail($id);
    $order->status = $request->status;

    // ✅ Nếu admin chọn trạng thái là completed thì thêm delivered_at
    if ($request->status === 'completed' && !$order->delivered_at) {
        $order->delivered_at = now();
    }

    $order->save();

    return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
}

    
}
