@extends('adminlte::page')

@section('title', 'Thêm bài viết')

@section('content_header')
    <h1>Thêm bài viết mới</h1>
@stop

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Nội dung bài viết</label>
            <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
        </div>

        <!-- Ảnh bìa -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Ảnh bìa</label>
            <input type="file" name="image" class="form-control">
        </div>

        <!-- Trạng thái bài viết -->
        <div class="mb-3">
            <label for="is_active" class="form-label fw-bold">Trạng thái</label>
            <input type="checkbox" name="is_active" value="1">
            <span>Bật</span>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@stop

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
