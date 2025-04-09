@extends('adminlte::page')

@section('content')
    <h1>Thêm phương thức thanh toán</h1>

    <form action="{{ route('payment_methods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="method_name">Tên phương thức</label>
            <input type="text" class="form-control" id="method_name" name="method_name" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
