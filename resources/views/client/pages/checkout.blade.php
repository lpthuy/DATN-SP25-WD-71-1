@extends('client.layouts.main')

@section('title', 'Xác nhận đơn hàng')

@section('content')
    <section class="container py-4">
        <h2 class="text-center mb-4">Xác nhận đơn hàng</h2>
        <div class="card shadow-lg p-4">
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Kích thước</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkoutItems as $item)
                            <tr>
                                <td><img src="{{ asset('storage/' . $item['image']) }}" width="60"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['color'] }}</td>
                                <td>{{ $item['size'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td class="text-danger font-weight-bold">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}₫</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <div class="payment-section mt-4">
                    <h4>Chọn phương thức thanh toán</h4>
                    <div class="payment-methods">
                        <div class="method">
                            <input type="radio" id="cod" name="payment_method" value="cod" required>
                            <label for="cod"><b>Thanh toán khi nhận hàng (COD)</b></label>
                        </div>
                        <div class="method">
                            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" required>
                            <label for="bank_transfer"><b>Chuyển khoản ngân hàng</b></label>
                        </div>
                    </div>
                </div>
            
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-5">Xác nhận đặt hàng</button>
                </div>
            </form>
            
        </div>
    </section>

<style>
    .card {
        border-radius: 12px;
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .payment-methods {
        margin-top: 15px;
    }
    .method {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .payment-section h4{
        margin-left: 20px;
    }
    .method:hover {
        background: #f8f9fa;
    }
    .method input {
        margin-right: 10px;
    }
    .method-title {
        font-weight: bold;
        display: block;
    }
    .method-desc {
        font-size: 14px;
        color: gray;
    }
</style>

@endsection
