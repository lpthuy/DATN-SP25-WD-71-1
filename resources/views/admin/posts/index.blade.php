@extends('adminlte::page')

@section('title', 'Danh sách bài viết')

@section('content_header')
    <h1>Danh sách bài viết</h1>
@stop

@section('content')
    <!-- Thêm ô tìm kiếm -->
    <div class="d-flex justify-content-between align-items-center mb-3 w-100">
        <!-- Nút Thêm bài viết mới -->
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Thêm bài viết mới
        </a>
    
        <!-- Form tìm kiếm bài viết -->
        <div class="search-container">
            <form action="{{ route('posts.index') }}" method="GET" class="d-flex align-items-center">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm bài viết..." value="{{ request('keyword') }}" style="width: 250px;">
                <button type="submit" class="btn btn-primary ml-2">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </form>
        </div>
    </div>
    
    <!-- Bảng danh sách bài viết -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th>Ảnh bìa</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>

                    <!-- Hiển thị ảnh bìa nếu có -->
                    <td>
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="Ảnh bìa" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <span>Chưa có ảnh</span>
                        @endif
                    </td>

                    <!-- Trạng thái bài viết -->
                    <td>
                        @if($post->is_active)
                            <span class="badge bg-success">Bật</span>
                        @else
                            <span class="badge bg-secondary">Tắt</span>
                        @endif
                    </td>

                    <!-- Hành động -->
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Sửa</a>
                        
                        <!-- Nút bật/tắt trạng thái -->
                        <form action="{{ route('posts.toggleStatus', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn {{ $post->is_active ? 'btn-danger' : 'btn-success' }}">
                                {{ $post->is_active ? 'Tắt' : 'Bật' }}
                            </button>
                        </form>

                        <!-- Xóa bài viết -->
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $posts->appends(['keyword' => request('keyword')])->links() }}
    </div>
@stop
