@extends('adminlte::page')

@section('title', 'Chi tiết người dùng')

@section('content')
<div class="container-fluid px-0">
    <!-- Header -->
    <div class="bg-white py-4 px-5 border-bottom shadow-sm mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <h3 class="mb-0 text-dark fw-bold">
             Thông tin người dùng
            </h3>
            <a href="{{ route('user.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                <i class="fas fa-arrow-left me-2"></i> Quay lại danh sách
            </a>
        </div>
    </div>

    <!-- Card thông tin -->
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <div class="card border-0 shadow-lg rounded-4 mb-5">
                    <div class="card-body p-5">
                        <!-- Phần Avatar và Tên -->
                        <div class="d-flex align-items-center justify-content-start mb-5">
                            <div class="avatar-lg me-3">
                                <i class="fas fa-user-circle fa-5x text-primary"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0 text-dark">{{ $user->name }}</h3>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'info' }} mt-2 px-3 py-2">{{ ucfirst($user->role) }}</span>
                            </div>
                        </div>

                        <!-- Thông tin chi tiết -->
                        <div class="row g-4">
                            @php
                                $info = [
                                    ['label' => 'Email', 'value' => $user->email, 'icon' => 'fas fa-envelope'],
                                    ['label' => 'Số điện thoại', 'value' => $user->phone ?? 'Chưa có', 'icon' => 'fas fa-phone'],
                                    ['label' => 'Địa chỉ', 'value' => $user->address ?? 'Chưa có', 'icon' => 'fas fa-map-marker-alt'],
                                    ['label' => 'Ngày tạo', 'value' => $user->created_at->format('d/m/Y H:i'), 'icon' => 'fas fa-calendar-plus'],
                                ];
                            @endphp

                            @foreach ($info as $item)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start bg-light border rounded-4 p-4 h-100 shadow-sm">
                                        <div class="me-3">
                                            <i class="{{ $item['icon'] }} text-primary fs-4"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">{{ $item['label'] }}</div>
                                            <div class="fw-semibold fs-6 text-dark">{{ $item['value'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
   /* Avatar nhỏ */
.avatar-sm {
    background-color: #f4f6f9;
    border-radius: 50%;
    width: 60px; /* Điều chỉnh kích thước */
    height: 60px; /* Điều chỉnh kích thước */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px; /* Điều chỉnh kích thước icon cho phù hợp */
    border: 2px solid #007bff; /* Thêm viền màu để làm nổi bật ảnh đại diện */
}

/* Các phần hiển thị thông tin */
.card {
    background-color: #ffffff;
}

.badge {
    font-weight: 600;
}

/* Layout cho phần Avatar và Tên */
.d-flex {
    display: flex;
    align-items: center;
}

/* Điều chỉnh layout card */
.container-fluid {
    max-width: 1200px;
    margin: 0 auto;
}

.d-flex .me-3 {
    margin-right: 15px;
}

</style>
