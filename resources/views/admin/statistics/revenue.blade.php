@extends('adminlte::page')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Thống kê doanh thu</h2>

    <form method="GET" action="{{ route('admin.revenue.statistics') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="filter_type" class="form-label">Lọc theo:</label>
            <select name="filter_type" id="filter_type" class="form-control">
                <option value="day" {{ $filterType == 'day' ? 'selected' : '' }}>Ngày</option>
                <option value="month" {{ $filterType == 'month' ? 'selected' : '' }}>Tháng</option>
                <option value="year" {{ $filterType == 'year' ? 'selected' : '' }}>Năm</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="filter_value" class="form-label">Chọn ngày/tháng/năm:</label>
            <input type="text" name="filter_value" id="filter_value" class="form-control" value="{{ $filterValue }}">
        </div>
        <div class="col-md-4">
            <label for="filter_status" class="form-label">Trạng thái:</label>
            <select name="filter_status" id="filter_status" class="form-control">
                <option value="">Tất cả</option>
                @foreach ($statuses as $status)
                <option value="{{ $status }}" {{ $filterStatus == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Lọc</button>
        </div>
    </form>

    <!-- Bảng thống kê theo trạng thái -->
    <h4 class="mb-3">Thống kê theo trạng thái</h4>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Trạng thái</th>
                <th>Doanh thu</th>
                <th>Số lượng đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($statisticsByStatus as $status => $data)
            <tr>
                <td>
                    @if ($status == 'completed')
                    Đơn đã thành công
                    @elseif ($status == 'cancelled')
                    Đơn đã hủy
                    @else
                    {{ ucfirst($status) }}
                    @endif
                </td>
                <td>{{ number_format($data['revenue'], 0, ',', '.') }} VNĐ</td>
                <td>{{ $data['order_count'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Thêm thư viện Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#filter_value", {
            dateFormat: "Y-m-d",
            locale: "vn"
        });
    });
</script>

@endsection