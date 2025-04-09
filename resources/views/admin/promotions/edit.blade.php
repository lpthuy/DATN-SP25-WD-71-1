@extends('adminlte::page')

@section('content')
<div class="container">
    <h1 class="mt-4">Chỉnh Sửa Khuyến Mãi</h1>
    <form action="{{ route('promotions.update', $promotion->promotion_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã Khuyến Mãi</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ old('code', $promotion->code) }}" required>
            @error('code')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="discount_type">Loại Giảm Giá</label>
            <select class="form-control" name="discount_type" id="discount_type" required>
                <option value="fixed" {{ old('discount_type', $promotion->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed (Tiền mặt)</option>
                <option value="percentage" {{ old('discount_type', $promotion->discount_type) == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
            </select>
            @error('discount_type')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="discount_value">Giá Trị Giảm</label>
            <input type="number" step="0.01" class="form-control" name="discount_value" id="discount_value" value="{{ old('discount_value', $promotion->discount_value) }}" required>
            @error('discount_value')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="usage_limit">Giới Hạn Sử Dụng</label>
            <input type="number" class="form-control" name="usage_limit" id="usage_limit" value="{{ old('usage_limit', $promotion->usage_limit) }}">
            @error('usage_limit')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="min_purchase_amount">Số Tiền Tối Thiểu Để Áp Dụng</label>
            <input type="number" step="0.01" class="form-control" name="min_purchase_amount" id="min_purchase_amount" value="{{ old('min_purchase_amount', $promotion->min_purchase_amount) }}">
            @error('min_purchase_amount')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="start_date">Ngày Bắt Đầu</label>
            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($promotion->start_date)->format('Y-m-d\TH:i')) }}" required>
            @error('start_date')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="end_date">Ngày Kết Thúc</label>
            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($promotion->end_date)->format('Y-m-d\TH:i')) }}" required>
            @error('end_date')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" {{ old('is_active', $promotion->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Hoạt động</label>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Khuyến Mãi</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection