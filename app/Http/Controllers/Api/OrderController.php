<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompletedOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


public function index(Request $request)
{
    $user = auth()->user();

    if ($user->role !== 'shipper') {
        return response()->json(['message' => 'Bạn không có quyền truy cập'], 403);
    }

    $status = $request->input('status');

    // ✅ Nếu là đơn đã hoàn thành → lấy từ bảng completed_orders
    if ($status === 'completed') {
        $completedOrderIds = CompletedOrder::where('shipper_id', $user->id)
            ->pluck('order_id');

        $orders = Order::whereIn('id', $completedOrderIds)->latest()->get();
    }
    // ✅ Nếu truyền status khác (ví dụ: 'shipping', 'cancelled',...) → lọc theo status
    elseif ($status) {
        $orders = Order::where('status', $status)->latest()->get();
    }
    // ✅ Nếu không truyền status → mặc định lấy đơn đang giao của shipper đó
    else {
        $orders = Order::where('status', 'shipping')->latest()->get();
    }

    return response()->json([
        'status' => 'success',
        'orders' => $orders,
    ]);
}

    



    // Trong OrderController.php
    public function updateStatus(Request $request, $id)
{
    \Log::info('📦 [Shipper] Yêu cầu cập nhật trạng thái đơn hàng', [
        'shipper_id' => auth()->id(),
        'order_id' => $id,
        'new_status' => $request->status,
    ]);

    // ✅ Kiểm tra quyền
    if (auth()->user()->role !== 'shipper') {
        \Log::warning('🚫 Truy cập trái phép - không phải shipper', ['user_id' => auth()->id()]);
        return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
    }

    // ✅ Validate đầu vào
    $request->validate([
        'status' => 'required|string|in:shipping,completed,cancelled',
    ]);

    // ✅ Cập nhật đơn hàng
    $order = Order::findOrFail($id);
    $order->update([
        'status' => $request->status,
    ]);

    // ✅ Truy vấn lại trạng thái sau khi lưu
    $refreshedOrder = Order::find($order->id);

    \Log::info('✅ Trạng thái đã được cập nhật trong CSDL', [
        'order_id' => $order->id,
        'saved_status' => $refreshedOrder->status,
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Đã cập nhật trạng thái',
        'order' => $refreshedOrder,
    ]);
}

    

public function markAsPaid($id)
{
    $order = Order::findOrFail($id);

    // Kiểm tra quyền của shipper (nếu cần)
    if (auth()->user()->role !== 'shipper') {
        return response()->json([
            'status' => 'error',
            'message' => 'Bạn không có quyền thực hiện hành động này',
        ], 403);
    }

    $order->is_paid = 1;
    $order->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Đã xác nhận thanh toán',
    ]);
}

public function completed(Request $request)
{
    $shipperId = auth()->id(); // ID của shipper đang đăng nhập

    $completedOrders = CompletedOrder::with('order')
        ->where('shipper_id', $shipperId)
        ->latest('completed_at')
        ->get()
        ->pluck('order'); // Trả về danh sách đơn hàng gốc

    return response()->json([
        'status' => 'success',
        'orders' => $completedOrders,
    ]);
}




    

}
