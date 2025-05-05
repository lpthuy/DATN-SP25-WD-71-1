@extends('adminlte::page')

@section('title', 'Danh sách người dùng')

@section('content')
    <h1 class="mb-4"><i class="fas fa-users"></i> Danh sách người dùng</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped table-bordered align-middle text-nowrap">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Đơn hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td><i class="fas fa-envelope"></i> {{ $user->email }}</td>
                            <td><i class="fas fa-phone"></i> {{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $user->orders->count() }}</span>
                            </td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                {{-- <form action="{{ route('user.toggleActive', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="btn btn-sm btn-{{ $user->is_active ? 'warning' : 'success' }}" type="submit">
                                        <i class="fas fa-toggle-{{ $user->is_active ? 'off' : 'on' }}"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Không có người dùng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
@endsection
