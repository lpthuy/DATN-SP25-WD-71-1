@extends('client.layouts.main')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container mt-4">
    <h2 class="section-title">Chi tiết đơn hàng #{{ $order->order_code }}</h2>
    <p><strong>Phương thức thanh toán:</strong> {{ strtoupper($order->payment_method) }}</p>
    <p><strong>Trạng thái:</strong> <span id="order-status">{{ ucfirst($order->status) }}</span></p>
    <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

    <h3 class="section-title">Thông tin người dùng</h3>
    
    {{-- ✅ Thêm địa chỉ người dùng --}}
    <p><strong>Khách hàng:</strong> {{ $order->user->name ?? '---' }}</p>
    <p><strong>Email:</strong> {{ $order->user->email ?? '---' }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->user->phone ?? '---' }}</p>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->user->address ?? 'Chưa cập nhật' }}</p>

    <h3 class="section-title">Thông tin đơn hàng</h3>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                    <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                </tr>
                @php $total += $item->price * $item->quantity; @endphp
            @endforeach
        </tbody>
    </table>

    <div class="text-right">
        {{-- Giá gốc --}}
        <div class="section-title">
            <p><strong>Giá gốc:</strong> {{ number_format($total, 0, ',', '.') }}₫</p>
    
            {{-- Nếu có mã giảm giá đã dùng --}}
            @if($order->promotion_code)
                @php
                    $promotion = \App\Models\Promotion::where('code', $order->promotion_code)->first();
                    $discountAmount = 0;
                    if ($promotion) {
                        if ($promotion->discount_type === 'fixed') {
                            $discountAmount = $promotion->discount_value;
                        } elseif ($promotion->discount_type === 'percentage') {
                            $discountAmount = $total * ($promotion->discount_value / 100);
                        }
                    }
                    $finalTotal = $total - $discountAmount;
                @endphp
        
                {{-- <p><strong>Mã giảm giá đã dùng:</strong> {{ $order->promotion_code }}</p> --}}
                <p><strong>Đã giảm:</strong> {{ number_format($discountAmount, 0, ',', '.') }}₫</p>
                <h4 ><strong>Tổng cộng:</strong> {{ number_format($finalTotal, 0, ',', '.') }}₫</h4>
            @else
                <h4 ><strong>Tổng cộng:</strong> {{ number_format($total, 0, ',', '.') }}₫</h4>
            @endif
        </div>
        
    </div>
    

    <a href="{{ route('order') }}" class="btn btn-secondary mt-3">⬅ Quay lại danh sách đơn hàng</a>
</div>

<style>
    .section-title {
    background: linear-gradient(to right, #ff4b2b, #ff416c); /* gradient đỏ hồng */
    color: white;
    padding: 12px 20px;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 6px;
    margin-top: 30px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const orderId = {{ $order->id }};
        const statusElement = document.getElementById("order-status");
        let currentStatus = statusElement.innerText.toLowerCase();

        setInterval(() => {
            fetch(`/api/order-status/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status && data.status.toLowerCase() !== currentStatus) {
                        currentStatus = data.status.toLowerCase();
                        statusElement.innerText = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                    }
                })
                .catch(error => {
                    console.error("Lỗi khi lấy trạng thái đơn hàng:", error);
                });
        }, 2000); // Gọi mỗi 3 giây
    });
</script>

@endsection
