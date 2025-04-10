@extends('adminlte::page')

@section('title', 'Chỉnh sửa Kích thước')

@section('content_header')
    <h1>Chỉnh sửa Kích thước: {{ $size->size_name }}</h1>
@endsection

@section('content')
    <form action="{{ route('sizes.update', $size->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="size_name">Tên Kích thước</label>
            <input type="text" name="size_name" class="form-control" value="{{ $size->size_name }}" required>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('sizes.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
