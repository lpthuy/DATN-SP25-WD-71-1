@extends('adminlte::page')

@section('title', 'Thống kê tổng quan')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="text-center mb-4">📊 Thống kê tổng quan</h2>
    @php
    $statusMap = [
        'processing' => 'Đang xử lý',
        'confirming' => 'Đang xác nhận',
        'shipping' => 'Đang giao hàng',
        'completed' => 'Đã giao thành công',
        'đã nhận hàng' => 'Đã nhận hàng',
        'cancelled' => 'Đã hủy',
        'returning' => 'Đang chờ hoàn hàng',
        'returned' => 'Đã hoàn hàng',
    ];
    @endphp

    <!-- Bộ lọc theo khoảng thời gian -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.revenue.statistics') }}" class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label for="from" class="form-label mb-0 fw-bold">Từ ngày:</label>
                    <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
                </div>
                <div class="col-md-2">
                    <label for="to" class="form-label mb-0 fw-bold">Đến ngày:</label>
                    <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
                </div>
                {{-- <div class="col-md-2">
                    <label for="filter_month" class="form-label mb-0 fw-bold">Tháng:</label>
                    <select name="filter_month" id="filter_month" class="form-select">
                        <option value="">-- Chọn tháng --</option>
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('filter_month') == $m ? 'selected' : '' }}>{{ $m }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="filter_year" class="form-label mb-0 fw-bold">Năm:</label>
                    <select name="filter_year" id="filter_year" class="form-select">
                        <option value="">-- Chọn năm --</option>
                        @for($y = date('Y') - 5; $y <= date('Y'); $y++)
                            <option value="{{ $y }}" {{ request('filter_year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div> --}}
                <div class="col-md-2">
                    <label for="status" class="form-label mb-0 fw-bold">Trạng thái:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="all">Tất cả</option>
                        @foreach($availableStatuses as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ $statusMap[$status] ?? ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Lọc thống kê</button>
                </div>
            </form>
            
        </div>
    </div>

    @if(request('from') && request('to'))
    <p class="text-muted">📅 Thống kê từ <strong>{{ \Carbon\Carbon::parse(request('from'))->format('d/m/Y') }}</strong> đến <strong>{{ \Carbon\Carbon::parse(request('to'))->format('d/m/Y') }}</strong></p>
    @endif

    @if($selectedStatus && $selectedStatus !== 'all')
        <p class="text-muted">📌 Đang lọc theo trạng thái: <strong>{{ ucfirst($selectedStatus) }}</strong></p>
    @endif

    <div class="row g-4">
        <!-- Thống kê đơn hàng -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <div class="card-header bg-primary text-white fw-bold">1. Đơn hàng</div>
                <div class="card-body" style="max-height: 420px; overflow-y: auto;">
                    
                    <div class="row g-4">

                        {{-- Đơn hôm nay --}}
                        <div class="col-md-3 col-sm-6">
                            <div class="card shadow border-0 rounded-4 bg-gradient-primary text-white position-relative overflow-hidden h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center align-items-start">
                                    <div class="mb-2"><i class="fas fa-calendar-day fa-lg me-2"></i> Hôm nay</div>
                                    <h3 class="fw-bold mb-0">
                                        {{ !$selectedStatus || $selectedStatus === 'all' ? $orderStats['total_today'] : $orderStats['today'] }} đơn
                                    </h3>
                                </div>
                            </div>
                        </div>
                    
                        {{-- Đơn trong tuần --}}
                        <div class="col-md-3 col-sm-6">
                            <div class="card shadow border-0 rounded-4 bg-gradient-success text-white position-relative overflow-hidden h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center align-items-start">
                                    <div class="mb-2"><i class="fas fa-calendar-week fa-lg me-2"></i> Tuần này</div>
                                    <h3 class="fw-bold mb-0">
                                        {{ !$selectedStatus || $selectedStatus === 'all' ? $orderStats['total_week'] : $orderStats['week'] }} đơn
                                    </h3>
                                </div>
                            </div>
                        </div>
                    
                        {{-- Đơn trong tháng --}}
                        <div class="col-md-3 col-sm-6">
                            <div class="card shadow border-0 rounded-4 bg-gradient-warning text-dark position-relative overflow-hidden h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center align-items-start">
                                    <div class="mb-2"><i class="fas fa-calendar-alt fa-lg me-2"></i> Tháng này</div>
                                    <h3 class="fw-bold mb-0">
                                        {{ !$selectedStatus || $selectedStatus === 'all' ? $orderStats['total_month'] : $orderStats['month'] }} đơn
                                    </h3>
                                </div>
                            </div>
                        </div>
                    
                        {{-- Tổng theo bộ lọc --}}
                        <div class="col-md-3 col-sm-6">
                            <div class="card shadow border-0 rounded-4 bg-gradient-dark text-white position-relative overflow-hidden h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center align-items-start">
                                    <div class="mb-2"><i class="fas fa-filter fa-lg me-2"></i> Theo bộ lọc</div>
                                    <h3 class="fw-bold mb-0">{{ $orderStats['total_filtered'] }} đơn</h3>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                    
         

                
                    <p><strong>Thống kê theo trạng thái:</strong></p>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Trạng thái</th>
                                    <th>Số đơn</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderStats['by_status'] as $status => $stat)
                                @if($selectedStatus === 'all' || $selectedStatus === null || $selectedStatus === $status)
                                <tr>
                                    <td>{{ $statusMap[$status] ?? ucfirst($status) }}</td>
                                    <td>{{ $stat['order_count'] }}</td>
                                    <td>{{ number_format($stat['revenue'], 0, ',', '.') }} đ</td>
                                </tr>
                                @endif
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                 

                    <p><strong>Giá trị đơn hàng trung bình:</strong> {{ number_format($orderStats['avg_order_value'], 0, ',', '.') }} VNĐ</p>

                    @if(!$selectedStatus || $selectedStatus === 'all')
                    <canvas id="orderStatusChart" height="200"></canvas>
                    @endif
                </div>
            </div>
        </div>

        <!-- Thống kê doanh thu - lợi nhuận -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <div class="card-header bg-success text-white fw-bold">2. Doanh thu & Lợi nhuận</div>
                <div class="card-body">
                    <p><strong>Doanh thu hôm nay:</strong> {{ number_format($revenueStats['today'], 0, ',', '.') }} VNĐ</p>
                    <p><strong>Doanh thu tổng:</strong> {{ number_format($revenueStats['month'], 0, ',', '.') }} VNĐ</p>
                    {{-- <p><strong>Lợi nhuận:</strong> {{ number_format($revenueStats['profit'], 0, ',', '.') }} VNĐ</p> --}}
                    <p><strong>Top ngày doanh thu cao nhất:</strong> {{ $revenueStats['top_day'] }}</p>
                    <canvas id="revenueChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <!-- Thống kê sản phẩm -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <div class="card-header bg-warning text-dark fw-bold">3. Sản phẩm</div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="productStatsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="top-seller-tab" data-bs-toggle="tab" data-bs-target="#top-seller" type="button" role="tab" aria-controls="top-seller" aria-selected="true">
                                Top 10 bán chạy
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="low-stock-tab" data-bs-toggle="tab" data-bs-target="#low-stock" type="button" role="tab" aria-controls="low-stock" aria-selected="false">
                                Sắp hết hàng
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="least-seller-tab" data-bs-toggle="tab" data-bs-target="#least-seller" type="button" role="tab" aria-controls="least-seller" aria-selected="false">
                                Top ế nhất
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="productStatsTabContent">
                        <div class="tab-pane fade show active" id="top-seller" role="tabpanel" aria-labelledby="top-seller-tab">
                            <p><strong>Top 10 sản phẩm bán chạy:</strong></p>
                            @if($productStats['top_seller']->isEmpty())
                                <p>Không có dữ liệu.</p>
                            @else
                            <ol>
                                @foreach($productStats['top_seller'] as $product)
                                    <li>{{ $product->name }} (Đã bán: {{ $product->total_sold }} SP)</li>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="low-stock" role="tabpanel" aria-labelledby="low-stock-tab">
                            @if($productStats['low_stock']->isEmpty())
                                <p><strong>Sắp hết hàng:</strong> Không có dữ liệu.</p>
                            @else
                                <p><strong>Sản phẩm sắp hết hàng:</strong></p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Phân loại</th>
                                                <th>Tồn kho</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productStats['low_stock'] as $variant)
                                                <tr>
                                                    <td>{{ $variant->product->name ?? 'N/A' }}</td>
                                                <td>
                                @if($variant->color)
                                    <span style="background-color: {{ $variant->color->color_code }}; color: #fff; padding: 5px 10px; border-radius: 4px;">
                                        {{ $variant->color->color_name }}
                                    </span>
                                @else
                                    Không phân loại
                                @endif
                            </td>
                        <td><span class="badge bg-danger">{{ $variant->stock_quantity }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

                        </div>
                        <div class="tab-pane fade" id="least-seller" role="tabpanel" aria-labelledby="least-seller-tab">
                            <p><strong>Top 10 sản phẩm bán ế:</strong></p>
                            @if($productStats['least_seller']->isEmpty())
                                <p>Không có dữ liệu.</p>
                            @else
                            <ol>
                                @foreach($productStats['least_seller'] as $product)
                                    <li>{{ $product->name }} – Đã bán: {{ $product->total_sold }}</li>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thống kê khách hàng -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <div class="card-header bg-info text-white fw-bold">4. Khách hàng</div>
                <div class="card-body">
                    <p><strong>Khách hàng mới hôm nay:</strong> {{ $customerStats['new_today'] }}</p>
                    <p><strong>Top 3 khách hàng mua nhiều nhất:</strong></p>
                    <ol>
                        @foreach($customerStats['top_buyers'] as $buyer)
                            <li>{{ $buyer->name }} - {{ number_format($buyer->total_spent) }}đ</li>
                        @endforeach
                    </ol>
                    
                    <p><strong>Top 3 khách hàng trung thành nhất:</strong></p>
                    <ol>
                        @foreach($customerStats['loyal_customers'] as $loyal)
                            <li>{{ $loyal->name }} - {{ $loyal->orders_count }} đơn hàng</li>
                        @endforeach
                    </ol>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@if(!$selectedStatus || $selectedStatus === 'all')
<script>
const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
new Chart(orderStatusCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode(array_keys($orderStats['by_status'])) !!},
        datasets: [{
            data: {!! json_encode(array_map(fn($stat) => $stat['order_count'], $orderStats['by_status'])) !!},
            backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545', '#6c757d', '#17a2b8']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
@endif
<script>
const revenueCtx = document.getElementById('revenueChart').getContext('2d');
new Chart(revenueCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_keys($revenueStats['chart_data'])) !!},
        datasets: [{
            label: 'Doanh thu ',
            data: {!! json_encode(array_values($revenueStats['chart_data'])) !!},
            fill: false,
            borderColor: '#28a745',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection