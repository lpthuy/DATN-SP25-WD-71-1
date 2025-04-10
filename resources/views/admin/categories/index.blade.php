@extends('adminlte::page')

@section('title', 'Danh sách danh mục')

@section('content_header')
    <h1>Danh sách danh mục</h1>
@endsection

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th>Ảnh</th> <!-- Cột ảnh -->
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent ? $category->parent->name : 'Không có' }}</td>
                <td>
                    <!-- Kiểm tra xem danh mục có ảnh không, nếu có thì hiển thị -->
                    @if($category->image_url)
                        <img src="{{ asset('storage/' . $category->image_url) }}" alt="{{ $category->name }}" width="50" height="50">
                    @else
                        <span>Không có ảnh</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="{{ route('categories.toggle', $category->id) }}" 
                        class="btn btn-sm {{ $category->is_active ? 'btn-secondary' : 'btn-success' }}">
                         <i class="fas {{ $category->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                         {{ $category->is_active ? 'Ẩn' : 'Hiện' }}
                     </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
