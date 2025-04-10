@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Khuyến Mãi</h3>
                    <div class="card-tools">
                        <a href="{{ route('promotions.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tạo Khuyến Mãi Mới
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Mã Khuyến Mãi</th>
                                    <th>Loại Giảm Giá</th>
                                    <th>Giá Trị Giảm</th>
                                    <th>Giới Hạn Sử Dụng</th>
                                    <th>Số Tiền Tối Thiểu</th>
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
                                    <td>{{ number_format($promo->discount_value, 2) }} {{ $promo->discount_type == 'percentage' ? '%' : 'VND' }}</td>
                                    <td>{{ $promo->usage_limit ?? 'Không giới hạn' }}</td>
                                    <td>{{ number_format($promo->min_purchase_amount, 2) }} VND</td>
                                    <td>{{ \Carbon\Carbon::parse($promo->start_date)->format('d/m/Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($promo->end_date)->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $promo->status == 'Active' ? 'success' : ($promo->status == 'Expired' ? 'danger' : ($promo->status == 'Out of Codes' ? 'warning' : 'secondary')) }}">
                                            {{ $promo->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('promotions.edit', $promo->promotion_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Sửa
                                            </a>
                                            <form action="{{ route('promotions.toggle', $promo->promotion_id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-{{ $promo->is_active ? 'danger' : 'success' }} btn-sm">
                                                    <i class="fas fa-power-off"></i> {{ $promo->is_active ? 'Tắt' : 'Bật' }}
                                                </button>
                                            </form>
                                            <form action="{{ route('promotions.destroy', $promo->promotion_id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p class="text-muted">Tổng số khuyến mãi: {{ $promotions->count() }}</p>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .table-responsive {
        overflow-x: auto;
    }

    .badge {
        font-size: 0.9em;
        padding: 0.5em 1em;
    }

    .btn-group .btn {
        margin-right: 5px;
    }

    .card-header {
        background-color: #007bff;
        color: white;
    }

    .card-tools {
        margin-left: auto;
    }
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.alert').delay(3000).fadeOut();
    });
</script>
@endsection