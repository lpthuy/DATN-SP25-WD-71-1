@extends('adminlte::page')

@section('title', 'Chi tiết người dùng')

@section('content')
    <h1>Chi tiết người dùng: {{ $user->name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Vai trò:</strong> {{ $user->role }}</p>
            <p><strong>Số điện thoại:</strong> {{ $user->phone ?? 'Chưa có' }}</p>
            <p><strong>Địa chỉ:</strong> {{ $user->address ?? 'Chưa có' }}</p>
            <p><strong>Trạng thái:</strong> {{ isset($user->is_active) ? ($user->is_active ? 'Kích hoạt' : 'Ẩn') : 'Chưa xác định' }}</p>
            <p><strong>Ngày tạo:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <h2>Danh sách đơn hàng</h2>
    @if ($user->orders->isEmpty())
        <p>Không có đơn hàng nào.</p>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('user.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection