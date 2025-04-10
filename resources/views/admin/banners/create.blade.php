@extends('adminlte::page')

@section('content')
<h1>Thêm Banner</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="link">Liên kết</label>
        <input type="url" class="form-control" id="link" name="link">
    </div>

    <div class="form-group">
        <label for="position">Vị trí</label>
        <input type="number" class="form-control" id="position" name="position" required>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select class="form-control" id="status" name="status">
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>

    <button type="submit" class="btn btn-primary">Thêm Banner</button>
</form>
@endsection
