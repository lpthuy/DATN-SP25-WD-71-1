@extends('adminlte::page')

@section('content')
    <h1>Chỉnh sửa Banner</h1>

    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $banner->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description">{{ $banner->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="link">Liên kết</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}">
        </div>

        <div class="form-group">
            <label for="position">Vị trí</label>
            <input type="number" class="form-control" id="position" name="position" value="{{ $banner->position }}" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $banner->status ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ !$banner->status ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($banner->image)
                <p><img src="{{ asset('storage/' . $banner->image) }}" width="100"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
