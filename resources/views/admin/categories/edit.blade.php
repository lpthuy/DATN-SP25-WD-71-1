@extends('adminlte::page')

@section('title', 'Chỉnh sửa danh mục')

@section('content_header')
    <h1>Chỉnh sửa danh mục: {{ $category->name }}</h1>
@endsection

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="form-group">
            <label for="image">Ảnh danh mục</label>
            <input type="file" name="image" class="form-control-file">
            @if ($category->image_url)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $category->image_url) }}" alt="Ảnh danh mục" width="150">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
