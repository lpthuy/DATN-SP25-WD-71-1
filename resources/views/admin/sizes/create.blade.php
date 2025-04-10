@extends('adminlte::page')

@section('title', 'Thêm Kích thước')

@section('content_header')
    <h1>Thêm Kích thước</h1>
@endsection

@section('content')
    <form action="{{ route('sizes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="size_name">Tên Kích thước</label>
            <input type="text" name="size_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu Kích thước</button>
        <a href="{{ route('sizes.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
