@extends('adminlte::page')

@section('content')
<h1>Chỉnh sửa danh mục</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
    </div>

    <div class="form-group">
        <label for="sku">Mã SKU</label>
        <input type="text" class="form-control" id="sku" name="sku" value="{{ $category->sku }}" required>
    </div>

    <div class="form-group">
        <label for="parent_category_id">Danh mục cha</label>
        <select class="form-control" id="parent_category_id" name="parent_category_id">
            <option value="">-- Không có --</option>
            @foreach($parentCategories as $parent)
            <option value="{{ $parent->id }}" {{ $category->parent_category_id == $parent->id ? 'selected' : '' }}>
                {{ $parent->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="is_active">Trạng thái</label>
        <select class="form-control" id="is_active" name="is_active">
            <option value="1" {{ $category->is_active ? 'selected' : '' }}>Hoạt động</option>
            <option value="0" {{ !$category->is_active ? 'selected' : '' }}>Không hoạt động</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh</label>
        @if($category->image_url)
        <img src="{{ asset('storage/' . $category->image_url) }}" width="50" height="50">
        @endif
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection