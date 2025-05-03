@extends('adminlte::page')

@section('title', 'Danh sách Bình luận')

@section('content_header')
    <h1 class="text-center font-weight-bold text-primary">Danh sách Bình luận</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="GET" action="{{ route('admin.comments.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Nhập nội dung, tên người dùng hoặc sản phẩm..." 
                   value="{{ request()->search }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Sản phẩm</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>
                    @if ($comment->user_id)
                        <span class="badge badge-info">Đã đăng nhập</span> 
                        {{ optional($comment->user)->name }}
                    @else
                        <span class="badge badge-secondary">Chưa đăng nhập</span> 
                        {{ $comment->name ?? 'Khách' }}
                    @endif
                </td>
                <td>{{ $comment->user->email ?? $comment->email ?? 'Không có' }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    <a href="{{ route('productDetail', $comment->product->id) }}">
                        {{ $comment->product->name }}
                    </a>
                </td>
                <td>
                    @if($comment->is_visible)
                        <span class="badge badge-success">Hiện</span>
                    @else
                        <span class="badge badge-danger">Ẩn</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('comments.toggle', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $comment->is_visible ? 'btn-warning' : 'btn-success' }}">
                            {{ $comment->is_visible ? 'Ẩn' : 'Hiện' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Hiển thị phân trang Bootstrap -->
    <div class="d-flex justify-content-center mt-3">
        {{ $comments->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection
