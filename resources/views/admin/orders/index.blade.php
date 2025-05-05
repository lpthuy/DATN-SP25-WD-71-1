@extends('adminlte::page')

@section('title', 'Danh sách đơn hàng')
@section('content_header')
    <h1 class="text-center font-weight-bold text-primary">Danh sách đơn hàng</h1>
@endsection

@section('content')
 
<form method="GET" action="{{ route('orders.index') }}" class="mb-3 d-flex justify-content-end align-items-center w-100">
    <div class="search-container d-flex">
        <input type="text" name="search" class="form-control" placeholder="Tìm theo mã đơn, trạng thái..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="fas fa-search"></i> Tìm kiếm
        </button>
    </div>
</form>

<style>
    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .search-container input {
        width: 250px;
        padding: 5px 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .search-container button {
        border-radius: 5px;
    }

    .ml-2 {
        margin-left: 10px;
    }
</style>




@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Người dùng</th>
            <th>Địa chỉ người dùng</th> 
            <th>Phương thức</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Xem</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->order_code }}</td>

            <td>{{ $order->user->name ?? 'Không có tên' }}</td>
            <td>{{ $order->user->address ?? 'Chưa có địa chỉ' }}</td>

            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
            @php
                $statusMap = [
                    'processing' => 'Đang xử lý',
                    'confirming' => 'Đang xác nhận',
                    'shipping' => 'Đang giao hàng',
                    'completed' => 'Đã giao thành công',
                    'received' => 'Đã nhận hàng',
                    'cancelled' => 'Đã hủy',
                    'returning' => 'Đang chờ hoàn hàng',
                    'returned' => 'Đã hoàn hàng',
                ];
                @endphp

                @if (strtolower($order->payment_method) === 'vnpay' && $order->is_paid == 0)
                    <span class="text-danger font-weight-bold">Thanh toán thất bại</span>
                @else
                    {{ $statusMap[$order->status] ?? ucfirst($order->status) }}
                @endif
            </td>

            
            <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">Chi tiết</a>
                   
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Phân trang --}}
<div class="d-flex justify-content-center">
    {{ $orders->appends(request()->query())->links() }}
</div>
@endsection
