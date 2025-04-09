@extends('adminlte::page')

@section('title', 'Chi tiết bài viết')

@section('content_header')
    <h1 class="text-primary">Chi tiết bài viết</h1>
@endsection

@section('content')
    <div class="card shadow-lg mb-4">
        <div class="card-body d-flex flex-column">
            <!-- Tiêu đề bài viết -->
            <div class="mb-4">
                <h2 class="fw-bold text-dark">{{ $post->title }}</h2>
                <p class="text-muted">Đăng vào: {{ $post->created_at->format('d/m/Y H:i') }}</p>
            </div>
    
            <!-- Nội dung bài viết -->
            <div class="mb-4 flex-grow-1"> 
                <h4 class="fw-bold text-dark">Nội dung bài viết</h4>
                <p>{!! $post->content !!}</p>
            </div>
    
            <!-- Hình ảnh bài viết (nếu có) -->
            @if($post->image)
                <div class="mb-4">
                    <h4 class="fw-bold text-dark">Hình ảnh bài viết</h4>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-fluid rounded shadow-sm">
                </div>
            @endif
    
            <!-- Các nút điều hướng -->
            <div class="mt-auto d-flex justify-content-between">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại danh sách bài viết
                </a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Chỉnh sửa bài viết
                </a>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
    /* Đảm bảo hình ảnh luôn linh hoạt và không bị giãn */
    .img-fluid {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 5px;
    }

    /* Phòng tránh việc nhảy dòng ở các thẻ văn bản */
    .post-content, .card-body {
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal; /* Không cố định trong 1 dòng */
    }

    /* Giữ độ cao cho iframe (video) và giúp không bị biến dạng */
    iframe {
        width: 100%;
        max-width: 100%;
        height: auto;
        display: block;
        margin: 10px 0;
        border-radius: 5px;
    }

    /* Đảm bảo nút điều hướng vẫn nằm dưới cùng khi nội dung dài */
    .mt-auto {
        margin-top: auto !important;
    }

    /* Đảm bảo card có khoảng cách, không bị dính nhau */
    .card {
        border-radius: 8px;
        margin-bottom: 20px;
    }

    /* Giữ các đoạn văn bản ngắn gọn không bị chia dòng */
    .post-content h1, .post-content h2, .post-content h3 {
        white-space: nowrap;
    }
    
    /* Đảm bảo card-body luôn có chiều cao hợp lý */
    .card-body {
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }
</style>

@endsection
