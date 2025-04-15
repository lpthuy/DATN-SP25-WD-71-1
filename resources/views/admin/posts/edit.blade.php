@extends('adminlte::page')

@section('title', 'Chỉnh sửa bài viết')

@section('content_header')
    <h1 class="text-center font-weight-bold text-primary">Chỉnh sửa bài viết : {{$post->title}}</h1>
@endsection

@section('content')

    <div class="card shadow p-4">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Đảm bảo là PUT vì bạn đang cập nhật dữ liệu -->
            
            <!-- Tiêu đề bài viết -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Tiêu đề bài viết</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <!-- Nội dung bài viết -->
            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Nội dung bài viết</label>
                <textarea id="content" name="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Ảnh bìa -->
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Ảnh bìa</label>
                <input type="file" name="image" class="form-control">
                @if ($post->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh bìa" width="100">
                    </div>
                @endif
            </div>

            <!-- Trạng thái bài viết -->
            <div class="mb-3">
                <label for="is_active" class="form-label fw-bold">Trạng thái</label>
                <input type="checkbox" name="is_active" {{ old('is_active', $post->is_active) ? 'checked' : '' }}>
                <span>{{ old('is_active', $post->is_active) ? 'Bật' : 'Tắt' }}</span>
            </div>

            <!-- Nút bấm lưu -->
            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Cập nhật bài viết
                </button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Hủy
                </a>
            </div>
        </form>
    </div>

@endsection

@section('css')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('js')
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
   $(document).ready(function() {
       console.log("Summernote script loaded");
       $('#content').summernote({
           height: 250,
           placeholder: 'Nhập nội dung bài viết...',
           tabsize: 2,
           toolbar: [
               ['style', ['bold', 'italic', 'underline', 'clear']],
               ['font', ['strikethrough', 'superscript', 'subscript']],
               ['fontsize', ['fontsize']],
               ['color', ['color']],
               ['para', ['ul', 'ol', 'paragraph']],
               ['height', ['height']],
               ['table', ['table']],
               ['insert', ['link', 'picture', 'video']],
               ['view', ['fullscreen', 'codeview', 'help']]
           ]
       });

       console.log("Summernote initialized");
   });
</script>
@endsection
