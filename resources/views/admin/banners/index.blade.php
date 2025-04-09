@extends('adminlte::page')

@section('content')
<h1>Danh sách Banner</h1>
<a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Thêm mới</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Hình ảnh</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Link</th>
            <th>Vị trí</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
        <tr>
            <td>
                @if($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}" width="80" height="50" />
                @else
                    Không có ảnh
                @endif
            </td>
            <td>{{ $banner->title ?? 'Không có' }}</td>
            <td>{{ $banner->description ?? 'Không có' }}</td>
            <td>
                @if($banner->link)
                    <a href="{{ $banner->link }}" target="_blank">Xem</a>
                @else
                    Không có
                @endif
            </td>
            <td>{{ $banner->position }}</td>
            <td>{{ $banner->status ? 'Hoạt động' : 'Ẩn' }}</td>
            <td>
                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
