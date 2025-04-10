@extends('adminlte::page')

@section('title', 'Thêm Màu sắc')

@section('content_header')
    <h1>Thêm Màu sắc</h1>
@endsection

@section('content')
    <form action="{{ route('colors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="color_name">Tên Màu sắc</label>
            <input type="text" name="color_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color_code">Mã Màu (HEX)</label>
            <input type="text" name="color_code" class="form-control" placeholder="#FF0000" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu Màu sắc</button>
        <a href="{{ route('colors.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
