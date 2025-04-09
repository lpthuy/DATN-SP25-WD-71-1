@extends('adminlte::page')


@section('content')
    <h1>Danh sách Phương thức thanh toán</h1>
    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary">Thêm mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tên phương thức</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $method)
                <tr>
                    <td>{{ $method->method_name }}</td>
                    <td>{{ $method->description }}</td>
                    <td>
                        @if($method->image_path)
                            <img src="{{ asset('storage/' . $method->image_path) }}" width="50" height="50" />
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('payment_methods.edit', $method->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('payment_methods.destroy', $method->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
