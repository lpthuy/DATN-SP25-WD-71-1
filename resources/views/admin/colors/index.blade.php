@extends('adminlte::page')

@section('title', 'Danh sách Màu sắc')

@section('content_header')
    <h1>Danh sách Màu sắc</h1>
@endsection

@section('content')
    <a href="{{ route('colors.create') }}" class="btn btn-primary mb-3">Thêm màu sắc</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Màu sắc</th>
                <th>Mã Màu</th>
                <th>Xem trước</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colors as $color)
            <tr>
                <td>{{ $color->id }}</td>
                <td>{{ $color->color_name }}</td>
                <td>{{ $color->color_code }}</td>
                <td>
                    <div style="width: 30px; height: 30px; background-color: {{ $color->color_code }}; border: 1px solid #ccc;"></div>
                </td>
                <td>
                    <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('colors.destroy', $color->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $colors->links() }}
@endsection
