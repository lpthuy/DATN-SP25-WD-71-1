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
    @if ($qrPath)
    <div style="text-align: center; margin: 30px 0;">
        <p><strong>Mã QR đơn hàng:</strong></p>
        <img src="{{ $qrPath }}" width="200" height="200" alt="QR Code">
    </div>
@endif

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
    $promotion = \App\Models\Promotion::where('code', $order->promotion_code)->first();
    $discountAmount = 0;

    if ($promotion) {
        $discountAmount = $promotion->discount_type === 'fixed'
            ? $promotion->discount_value
            : $total * ($promotion->discount_value / 100);
    }

    $subtotal = $total - $discountAmount;
    $shippingFee = $subtotal > 300000 ? 0 : 20000;
    $finalTotal = max(0, $subtotal + $shippingFee);
@endphp

<div class="mt-4">
    <h4><strong>Thông tin thanh toán</strong></h4>
    <p><strong>Giá gốc:</strong> {{ number_format($total, 0, ',', '.') }} VNĐ</p>
    <p><strong>Mã giảm giá:</strong> {{ $order->promotion_code ?? 'Không có' }}</p>
    <p><strong>Đã giảm:</strong> {{ number_format($discountAmount, 0, ',', '.') }} VNĐ</p>
    <p><strong>Phí vận chuyển:</strong>
        {{ $shippingFee == 0 ? 'Miễn phí' : number_format($shippingFee, 0, ',', '.') . ' VNĐ' }}
    </p>
    <h4 style="color:#e3342f"><strong>Tổng thanh toán:</strong> {{ number_format($finalTotal, 0, ',', '.') }} VNĐ</h4>
</div>


</body>
</html>
