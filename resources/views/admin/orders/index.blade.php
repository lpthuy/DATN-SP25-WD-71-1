@extends('adminlte::page')

@section('content')
<h2>Danh sách đơn hàng</h2>

    
<form method="GET" action="{{ route('orders.index') }}" class="mb-3" style="max-width: 400px;">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm theo mã đơn, trạng thái..." value="{{ request('search') }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>



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
                {{ $statusMap[$order->status] ?? ucfirst($order->status) }}
            </td>
            
            <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">Chi tiết</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá đơn hàng này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Xoá
                        </button>
                    </form>
                
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
