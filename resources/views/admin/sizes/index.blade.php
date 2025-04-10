@extends('adminlte::page')

@section('title', 'Danh sách Kích thước')

@section('content_header')
    <h1>Danh sách Kích thước</h1>
@endsection

@section('content')
    <a href="{{ route('sizes.create') }}" class="btn btn-primary mb-3">Thêm kích thước</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Kích thước</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sizes as $size)
            <tr>
                <td>{{ $size->id }}</td>
                <td>{{ $size->size_name }}</td>
                <td>
                    <a href="{{ route('sizes.edit', $size->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('sizes.destroy', $size->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sizes->links() }}
@endsection
