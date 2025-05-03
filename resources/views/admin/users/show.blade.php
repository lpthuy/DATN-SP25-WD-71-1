@extends('adminlte::page')

@section('title', 'Chi tiết người dùng')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center mb-4">
            <h1 class="h3 mb-0"><i class="fas fa-user-circle me-2 text-primary"></i> {{ $user->name }}</h1>
        </div>

        <div class="row g-4">
            <!-- Thông tin người dùng -->
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4 border-0 bg-white mb-4">
                    <div class="card-body">
                        <h4 class="mb-4 text-primary fw-bold">
                            <i class="fas fa-user-circle me-2"></i>Thông tin người dùng
                        </h4>
                
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <strong>ID:</strong> {{ $user->id }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Tên:</strong> {{ $user->name }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Email:</strong> {{ $user->email }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Vai trò:</strong>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'info' }}">{{ ucfirst($user->role) }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Số điện thoại:</strong> {{ $user->phone ?? 'Chưa có' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Địa chỉ:</strong> {{ $user->address ?? 'Chưa có' }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Trạng thái:</strong>
                                <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                                    {{ $user->is_active ? 'Kích hoạt' : 'Ẩn' }}
                                </span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Ngày tạo:</strong> {{ $user->created_at->format('d/m/Y H:i') }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Ngày cập nhật:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
            </div>

            <!-- Đơn hàng -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-gradient-primary text-white fw-semibold">
                        <i class="fas fa-shopping-bag me-1"></i> Đơn hàng
                    </div>
                    <div class="card-body p-0">
                        @if ($user->orders->isEmpty())
                            <div class="p-3 text-muted">Người dùng chưa có đơn hàng nào.</div>
                        @else
                            <table class="table table-bordered table-striped table-hover mb-0">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->orders as $order)
                                        <tr>
                                            <td class="text-center">#{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-end text-success">
                                                {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Quay lại
            </a>
        </div>
    </div>
@endsection
