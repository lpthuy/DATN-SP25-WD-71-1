@extends('adminlte::page')

@section('title', 'Chi tiết đơn hàng #' . $order->order_code)

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Nút quay lại */
    .btn-back {
        background: #6c757d;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: background 0.3s ease;
    }

    .btn-back:hover {
        background: #5a6268;
    }

    /* Card thông tin */
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background: #f8f9fa;
        border-bottom: 1px solid #ddd;
        padding: 15px;
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
        background: #fff;
        border-radius: 0 0 10px 10px;
    }

    .card-body p {
        margin: 10px 0;
        font-size: 1rem;
        color: #555;
    }

    .card-body p strong {
        color: #333;
    }

    /* Thông tin đơn hàng */
    .order-info {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .order-info p {
        font-size: 1rem;
        color: #555;
    }

    .order-info p strong {
        color: #333;
    }

    /* Form cập nhật trạng thái */
    .status-form {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .status-form label {
        font-weight: 600;
        color: #333;
    }

    .status-form select {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        width: 200px;
    }

    .status-form button {
        background: #007bff;
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .status-form button:hover {
        background: #0056b3;
    }

    /* Bảng sản phẩm */
    .table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background: #007bff;
        color: white;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .table tbody tr {
        border-bottom: 1px solid #eee;
        transition: background 0.3s ease;
    }

    .table tbody tr:hover {
        background: #f9f9f9;
    }

    /* Nút xuất PDF */
    .btn-export-pdf {
        background: #dc3545;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: background 0.3s ease;
    }

    .btn-export-pdf:hover {
        background: #c82333;
    }

    /* Responsive */
    @media (max-width: 768px) {
        h2 {
            font-size: 1.5rem;
        }

        .order-info {
            flex-direction: column;
        }

        .status-form {
            flex-direction: column;
            align-items: flex-start;
        }

        .status-form select,
        .status-form button {
            width: 100%;
        }

        .table th,
        .table td {
            font-size: 0.9rem;
            padding: 10px;
        }
    }
</style>

<div class="container">
    <h2>Chi tiết đơn hàng #{{ $order->order_code }}</h2>

    <!-- Nút quay lại -->
    <a href="{{ route('orders.index') }}" class="btn-back mb-3">
        <i class="fas fa-arrow-left"></i> Quay lại danh sách
    </a>

    <!-- Thông tin người đặt hàng -->
    <div class="card">
        <div class="card-header">Thông tin người đặt hàng</div>
        <div class="card-body">
            <p><strong>Họ tên:</strong> {{ $order->user->name ?? 'Không có' }}</p>
            <p><strong>Email:</strong> {{ $order->user->email ?? 'Không có' }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->user->phone ?? 'Không có' }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->user->address ?? 'Không có' }}</p>
        </div>
    </div>


{{-- Thông tin đơn --}}
<p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
<p><strong>Trạng thái:</strong> {{ $order->status }}</p>

<form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="mb-4">
    @csrf
    <label for="status">Cập nhật trạng thái:</label>
    <select id="status-select" name="status" class="form-control mb-2">
        <option value="Đang xử lý" {{ $order->status == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
        <option value="đang xác nhận" {{ $order->status == 'đang xác nhận' ? 'selected' : '' }}>Đang xác nhận</option>
        <option value="đang giao hàng" {{ $order->status == 'đang giao hàng' ? 'selected' : '' }}>đang giao hàng</option>
        <option value="đã giao thành công" {{ $order->status == 'đã giao thành công' ? 'selected' : '' }}>Đã giao thành công</option>
        <option value="returning" {{ $order->status == 'returning' ? 'selected' : '' }}>Đã hoàn hàng</option>
        <option value="đã hủy" {{ $order->status == 'đã hủy' ? 'selected' : '' }}>Đã hủy</option>
    </select>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

<script>
    const currentStatus = "{{ $order->status }}";

    const statusMap = {
    "processing": ["confirming"],
    "confirming": ["shipping"],
    "shipping": ["completed"],
    "completed": [],       // ✅ KHÔNG cho admin chọn "returned"
    "cancelled": [],
    "returning": []        // ✅ Cho hiển thị, không được chuyển sang
};


const statusLabels = {
    "processing": "Đang xử lý",
    "confirming": "Đang xác nhận",
    "shipping": "Đang giao hàng",
    "completed": "Đã giao thành công",
    "cancelled": "Đã hủy",
    "returning": "Đã hoàn hàng"
};



    const select = document.getElementById("status-select");
    select.innerHTML = "";

    // Thêm option hiện tại (disable)
    const currentOption = document.createElement("option");
    currentOption.value = currentStatus;
    currentOption.text = statusLabels[currentStatus] || currentStatus;
    currentOption.disabled = true;
    currentOption.selected = true;
    select.appendChild(currentOption);

    // Thêm trạng thái tiếp theo
    const nextStatuses = statusMap[currentStatus] || [];
    nextStatuses.forEach(status => {
        const opt = document.createElement("option");
        opt.value = status;
        opt.text = statusLabels[status] || status;
        select.appendChild(opt);
    });
</script>




<h4>Sản phẩm trong đơn hàng:</h4>
<td>
    <a href="{{ route('orders.exportPDF', $order->id) }}" class="btn btn-danger mb-3">
        <i class="fas fa-file-pdf"></i> Xuất PDF
    </a>
    
</td>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giá</th>
                <th>Thành tiền</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->color }}</td>
            <td>{{ $item->size }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->price) }} VNĐ</td>
                    <td>{{ number_format($item->price * $item->quantity) }} VNĐ</td>
            <th>
                
            </th>
        </tr>

        
        @endforeach
    </tbody>
</table>
@php
    $total = 0;
    foreach ($items as $item) {
        $total += $item->price * $item->quantity;
    }

    $promotion = null;
    $discountAmount = 0;
    $finalTotal = $total;

    if ($order->promotion_code) {
        $promotion = \App\Models\Promotion::where('code', $order->promotion_code)->first();
        if ($promotion) {
            $discountAmount = $promotion->discount_type === 'fixed'
                ? $promotion->discount_value
                : $total * ($promotion->discount_value / 100);
            $finalTotal = max(0, $total - $discountAmount);
        }
    }
@endphp

@php
    $total = 0;
    foreach ($items as $item) {
        $total += $item->price * $item->quantity;
    }

    $promotion = null;
    $discountAmount = 0;

    if ($order->promotion_code) {
        $promotion = \App\Models\Promotion::where('code', $order->promotion_code)->first();
        if ($promotion) {
            $discountAmount = $promotion->discount_type === 'fixed'
                ? $promotion->discount_value
                : $total * ($promotion->discount_value / 100);
        }
    }

    $shippingFee = $total >= 300000 ? 0 : 20000; // Miễn phí ship nếu > 300k
    $finalTotal = max(0, $total - $discountAmount + $shippingFee);
@endphp

<div class="mt-4 border-top pt-3">
    <h4><strong>Thông tin thanh toán</strong></h4>
    <p><strong>Giá gốc:</strong> {{ number_format($total, 0, ',', '.') }} VNĐ</p>

    @if ($promotion)
        <p><strong>Mã giảm giá:</strong> {{ $order->promotion_code }} 
            ({{ $promotion->discount_type === 'percentage' ? $promotion->discount_value . '%' : number_format($promotion->discount_value, 0, ',', '.') . ' VNĐ' }})
        </p>
        <p><strong>Đã giảm:</strong> {{ number_format($discountAmount, 0, ',', '.') }} VNĐ</p>
    @endif

    <p><strong>Phí vận chuyển:</strong> {{ $shippingFee == 0 ? 'Miễn phí' : number_format($shippingFee, 0, ',', '.') . ' VNĐ' }}</p>

    <h4 style="color:#e3342f">
        <strong>Tổng thanh toán:</strong> {{ number_format($finalTotal, 0, ',', '.') }} VNĐ
    </h4>
</div>


@endsection
