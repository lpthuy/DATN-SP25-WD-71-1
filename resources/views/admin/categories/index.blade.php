@extends('adminlte::page')

@section('title', 'Danh sách Danh Mục')
@section('content_header')
    <h1 class="text-center font-weight-bold text-primary">Danh sách Danh Mục</h1>
@endsection

@section('content')
   
    <div class="d-flex justify-content-between align-items-center mb-3 w-100">
        <a href="{{ route('categories.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> thêm danh mục
        </a>
    
        <div class="search-container">
            <form action="{{ route('categories.index') }}" method="GET" class="d-flex align-items-center">
                <input type="text" name="keyword" class="form-control" placeholder="tìm kiếm tên danh mục" value="{{ request('keyword') }}">
                <button type="submit" class="btn btn-primary ml-2">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </form>
        </div>
    </div>
    
    <style>
        .search-container {
            border: 1px solid #ccc;
            padding: 5px;
            display: inline-flex;
            align-items: center;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
    
        .search-container input {
            width: 250px;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
    
        .search-container button {
            border-radius: 5px;
        }
    </style>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                {{-- <th>Danh mục cha</th> --}}
                <th>Ảnh</th> <!-- Cột ảnh -->
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                {{-- <td>{{ $category->parent ? $category->parent->name : 'Không có' }}</td> --}}
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
<!-- Phân trang -->
<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>
@endsection
