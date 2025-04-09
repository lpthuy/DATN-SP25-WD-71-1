<h2>Xin chào {{ $order->customer_name }}</h2>

<p>Cảm ơn bạn đã đặt hàng tại <strong>{{ config('app.name') }}</strong>!</p>

<p>Thông tin đơn hàng của bạn:</p>

<ul>
    <li>Mã đơn hàng: <strong>{{ $order->order_code }}</strong></li>
    <li>Ngày đặt: {{ $order->created_at->format('d/m/Y') }}</li>
</ul>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th>Sản phẩm</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp

        @foreach ($order->items as $item)
            @php
                $subtotal = $item->price * $item->quantity;
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->color ?? 'Không chọn' }}</td>
                <td>{{ $item->size ?? 'Không chọn' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                <td>{{ number_format($subtotal, 0, ',', '.') }}đ</td>
            </tr>
        @endforeach

        <tr style="font-weight: bold; background-color: #f9f9f9;">
            <td colspan="5" align="right">Tổng cộng:</td>
            <td>{{ number_format($total, 0, ',', '.') }}đ</td>
        </tr>
    </tbody>
</table>

<p>Chúng tôi sẽ xử lý và giao hàng sớm nhất có thể.</p>
<p>Trân trọng!</p>
