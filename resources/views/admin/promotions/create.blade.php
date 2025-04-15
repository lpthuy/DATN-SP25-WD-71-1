@extends('adminlte::page')
@section('title', 'Tạo Khuyến Mãi Mới')
@section('content_header')
<div class="container">
    <h1 class="mt-4">Tạo Khuyến Mãi Mới</h1>
    <form action="{{ route('promotions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Mã Khuyến Mãi</label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Nhập mã khuyến mãi" value="{{ old('code') }}" required>
            @error('code')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="discount_type">Loại Giảm Giá</label>
            <select class="form-control" name="discount_type" id="discount_type" required>
                <option value="">Chọn loại giảm giá</option>
                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Fixed (Tiền mặt)</option>
                <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
            </select>
            @error('discount_type')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="discount_value">Giá Trị Giảm</label>
            <input type="number" step="0.01" class="form-control" name="discount_value" id="discount_value" placeholder="Nhập giá trị giảm" value="{{ old('discount_value') }}" required>
            @error('discount_value')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="usage_limit">Giới Hạn Sử Dụng</label>
            <input type="number" class="form-control" name="usage_limit" id="usage_limit" placeholder="Nhập số lần sử dụng" value="{{ old('usage_limit') }}">
            @error('usage_limit')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="min_purchase_amount">Số Tiền Tối Thiểu Để Áp Dụng</label>
            <input type="number" step="0.01" class="form-control" name="min_purchase_amount" id="min_purchase_amount" placeholder="Nhập số tiền tối thiểu" value="{{ old('min_purchase_amount') }}">
            @error('min_purchase_amount')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Ngày Bắt Đầu</label>
            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
            @error('start_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">Ngày Kết Thúc</label>
            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
            @error('end_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Hoạt động</label>
        </div>

        <button type="submit" class="btn btn-primary">Tạo Khuyến Mãi</button>
        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection