<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdersController extends Controller
{
    // Xuất đơn hàng ra file PDF
    public function exportPDF($id)
    {
        // Tìm đơn hàng theo ID, kèm thông tin user
        $order = Order::with('user')->findOrFail($id);
        // Lấy danh sách sản phẩm thuộc đơn hàng
        $items = OrderItem::where('order_id', $id)->get();

        // Load view PDF với dữ liệu đơn hàng và sản phẩm
        $pdf = Pdf::loadView('client.orders.pdf', [
            'order' => $order,
            'items' => $items
        ]);

        // Tải file PDF về máy
        return $pdf->download("order_{$order->order_code}.pdf");
    }

    // Xoá một đơn hàng
    public function destroy($id)
    {
        $order = Order::findOrFail($id); // Tìm đơn hàng
        $order->delete(); // Xoá đơn hàng

        return redirect()->route('orders.index')->with('success', 'Đã xoá đơn hàng thành công.');
    }

    // Hiển thị danh sách đơn hàng (kèm tìm kiếm)
    public function index(Request $request)
    {
        $query = Order::query(); // Khởi tạo query builder

        // Nếu có từ khoá tìm kiếm
        if ($search = $request->input('search')) {
            $query->where('order_code', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhere('payment_method', 'like', "%$search%")
                  ->orWhere('user_id', $search); // Cho phép tìm kiếm user_id luôn
        }

        // Phân trang kết quả
        $orders = $query->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // Xem chi tiết một đơn hàng
    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id); // Tìm đơn hàng + user liên quan
        $items = OrderItem::where('order_id', $id)->get(); // Lấy danh sách sản phẩm
        return view('admin.orders.show', compact('order', 'items'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
{
    // Validate dữ liệu gửi lên
    $request->validate([
        'status' => 'required|string|max:50'
    ]);

    $order = Order::findOrFail($id); // Tìm đơn hàng

    // 👉 CHẶN cập nhật nếu thanh toán thất bại
    if ($order->payment_status === 'failed') {
        return redirect()->back()->with('error', 'Không thể cập nhật trạng thái vì đơn hàng này thanh toán thất bại.');
    }

    $order->status = $request->status; // Cập nhật trạng thái

    // Nếu trạng thái là "completed" mà chưa có ngày giao hàng thì set delivered_at
    if ($request->status === 'completed' && !$order->delivered_at) {
        $order->delivered_at = now();
    }

    $order->save(); // Lưu thay đổi

    return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
}

}
