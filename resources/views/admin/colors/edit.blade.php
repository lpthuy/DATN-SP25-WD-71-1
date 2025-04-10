@extends('adminlte::page')

@section('title', 'Chỉnh sửa Màu sắc')

@section('content_header')
    <h1>Chỉnh sửa Màu sắc: {{ $color->color_name }}</h1>
@endsection

@section('content')
    <form action="{{ route('colors.update', $color->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="color_name">Tên Màu sắc</label>
            <input type="text" name="color_name" class="form-control" value="{{ $color->color_name }}" required>
        </div>

        <div class="form-group">
            <label for="color_code">Mã Màu (HEX)</label>
            <input type="text" name="color_code" class="form-control" value="{{ $color->color_code }}" required>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('colors.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
