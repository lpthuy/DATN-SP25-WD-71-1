<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đơn hàng #{{ $order->order_code }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Chi tiết đơn hàng #{{ $order->order_code }}</h2>
    <p><strong>Phương thức thanh toán:</strong> {{ strtoupper($order->payment_method) }}</p>

    <p><strong>Họ tên:</strong> {{ $order->user->name ?? 'Không có' }}</p>
    <p><strong>Email:</strong> {{ $order->user->email ?? 'Không có' }}</p>
    <p><strong>Điện thoại:</strong> {{ $order->user->phone ?? 'Không có' }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->user->address ?? 'Không có' }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

    <table>
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
                    <td>{{ number_format($item->price) }} VNĐ</td>
                    <td>{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                </tr>
                @php $total += $item->price * $item->quantity; @endphp
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

<div class="mt-4 border-top pt-3">
    <h4><strong>Thông tin thanh toán</strong></h4>
    <p><strong>Giá gốc:</strong> {{ number_format($total, 0, ',', '.') }} VNĐ</p>

    @if ($promotion)
        <p><strong>Mã giảm giá:</strong> {{ $order->promotion_code }} 
            ({{ $promotion->discount_type === 'percentage' ? $promotion->discount_value . '%' : number_format($promotion->discount_value, 0, ',', '.') . ' VNĐ' }})
        </p>
        <p><strong>Đã giảm:</strong> {{ number_format($discountAmount, 0, ',', '.') }} VNĐ</p>
    @endif

    <h4 style="color:#e3342f"><strong>Tổng thanh toán:</strong> {{ number_format($finalTotal, 0, ',', '.') }} VNĐ</h4>
</div>

</body>
</html>
