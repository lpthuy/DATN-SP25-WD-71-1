@extends('adminlte::page')

@section('content')
<div class="container">
    <h1 class="mt-4">Danh sách Khuyến Mãi</h1>
    <a href="{{ route('promotions.create') }}" class="btn btn-primary mb-3">Tạo Khuyến Mãi Mới</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Mã Khuyến Mãi</th>
                <th>Loại Giảm Giá</th>
                <th>Giá Trị Giảm</th>
                <th>Giới Hạn Sử Dụng</th>
                <th>Số tiền tối thiểu để áp dụng</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promo)
                <tr>
                    <td>{{ $promo->promotion_id }}</td>
                    <td>{{ $promo->code }}</td>
                    <td>{{ ucfirst($promo->discount_type) }}</td>
                    <td>{{ $promo->discount_value }}</td>
                    <td>{{ $promo->usage_limit }}</td>
                    <td>{{ $promo->min_purchase_amount }}</td>
                    <td>{{ $promo->start_date }}</td>
                    <td>{{ $promo->end_date }}</td>
                    <td>{{ $promo->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('promotions.edit', $promo->promotion_id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('promotions.destroy', $promo->promotion_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
