@extends('adminlte::page')

    @section('title', 'Danh sách người dùng')

    @section('content')
        <h1>Danh sách người dùng</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
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
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->orders->count() }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">Xem</a>
                            <form action="{{ route('user.toggleActive', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                        
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Không có người dùng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
    @endsection