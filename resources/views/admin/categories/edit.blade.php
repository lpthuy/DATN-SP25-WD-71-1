@extends('adminlte::page')

<<<<<<< HEAD

=======
>>>>>>> e0d369a (Lưu lại thay đổi)
@section('title', 'Chỉnh sửa danh mục')

@section('content_header')
    <h1>Chỉnh sửa danh mục: {{ $category->name }}</h1>
@endsection

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="form-group">
            <label for="parent_id">Danh mục cha</label>
            <select name="parent_id" class="form-control">
                <option value="">Không có</option>
                @foreach($categories as $parentCategory)
                    <option value="{{ $parentCategory->id }}" @if($parentCategory->id == $category->parent_id) selected @endif>
                        {{ $parentCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
