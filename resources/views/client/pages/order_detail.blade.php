@extends('client.layouts.main')

@section('title', 'Chi tiết đơn hàng')

@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">Chi tiết đơn hàng #{{ $order->order_code }}</h2>
                    <p><strong>Phương thức thanh toán:</strong> {{ strtoupper($order->payment_method) }}</p>
                    <p><strong>Trạng thái:</strong> <span id="order-status">{{ ucfirst($order->status) }}</span></p>
                    <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

                </div>
                <div class="col-md-6">
                    <h3 class="section-title">Địa chỉ giao hàng</h3>
                    <p><strong>Khách hàng:</strong> {{ $order->shipping_name ?? $order->user->name }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->shipping_phone ?? $order->user->phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->shipping_address ?? $order->user->address }}</p>
                </div>
            </div>

            <h3 class="section-title">Sản phẩm đã đặt</h3>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Màu</th>
                        <th class="text-center">Size</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->color ?? '---' }}</td>
                            <td>{{ $item->size ?? '---' }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                        </tr>
                        @php $total += $item->price * $item->quantity; @endphp
                    @endforeach
                </tbody>
            </table>

            @php
                $promotion = null;
                $discountAmount = 0;
                $shippingFee = $total >= 300000 ? 0 : 35000;

                if ($order->promotion_code) {
                    $promotion = \App\Models\Promotion::where('code', $order->promotion_code)->first();
                    if ($promotion) {
                        $discountAmount = $promotion->discount_type === 'fixed'
                            ? $promotion->discount_value
                            : $total * ($promotion->discount_value / 100);
                    }
                }

                $finalTotal = max(0, $total - $discountAmount + $shippingFee);
            @endphp

            <div class="text-right">
                <div class="section-tit">
                    <table class="table">
                        <tr>
                            <td class="text-start">Giá GỐC</td>
                            <td class="text-end">{{ number_format($total, 0, ',', '.') }}đ</td>
                        </tr>
                        <tr>
                            <td class="text-start">MÃ GIẢM GIÁ</td>
                            <td class="text-end">{{ $order->promotion_code }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Đã giảm</td>
                            <td class="text-end ">{{ number_format($discountAmount, 0, ',', '.') }}₫</td>
                        </tr>
                        <tr>
                            <td class="text-start">Phí vận chuyển</td>
                            <td class="text-end ">
                                {{ $shippingFee == 0 ? 'Miễn phí' : number_format($shippingFee, 0, ',', '.') . '₫' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start"><strong>Tộng cộng</strong></td>
                            <td class="text-end fw-bold">{{ number_format($finalTotal, 0, ',', '.') }}₫</td>
                        </tr>
                    </table>
                </div>
            </div>


            <a href="{{ route('order') }}" class="btn btn-danger mt-3">⬅ Quay lại danh sách đơn hàng</a>
        </div>

        <style>
            .section-title {
                background: linear-gradient(to right, rgba(225, 17, 79, 0.98), rgb(248, 90, 90));
                color: white;
                padding: 12px 20px;
                font-size: 18px;
                font-weight: bold;
                text-transform: uppercase;
                border-radius: 6px;
                margin-top: 30px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .section-tit {
                color: black;
                padding: 12px 20px;
                font-size: 18px;
                text-transform: uppercase;
                border-radius: 6px;

            }

            .text-center {
                text-align: center;

            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const orderId = {
                    {
                    $order - > id
                }
            };
            const statusElement = document.getElementById("order-status");
            let currentStatus = statusElement.innerText.toLowerCase();

            setInterval(() => {
                fetch(`/api/order-status/${orderId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status && data.status.toLowerCase() !== currentStatus) {
                            currentStatus = data.status.toLowerCase();
                            statusElement.innerText = data.status.charAt(0).toUpperCase() + data.status
                                .slice(1);
                        }
                    })
                    .catch(error => {
                        console.error("Lỗi khi lấy trạng thái đơn hàng:", error);
                    });
            }, 3000);
            });
        </script>
    </head>
@endsection