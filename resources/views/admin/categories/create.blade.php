@extends('adminlte::page')
@section('title', 'Thêm danh mục')
@section('content_header')
    <h1 class="text-center font-weight-bold text-primary">thêm danh mục</h1>
@endsection

@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Ảnh danh mục</label>
            <input type="file" name="image" class="form-control-file" required>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Lưu danh mục</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
