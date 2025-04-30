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

}
