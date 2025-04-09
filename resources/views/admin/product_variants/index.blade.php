@extends('adminlte::page')

@section('title', 'Quản lý Biến thể')

@section('content_header')
    <h1>Biến thể của sản phẩm: {{ $product->name }}</h1>
@endsection

@section('content')
    <a href="{{ route('product_variants.create', $product->id) }}" class="btn btn-primary mb-3">Thêm biến thể</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Size</th>
                <th>Màu</th>
                <th>Giá</th>
                <th>Giá giảm</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($product->variants as $variant)
            <tr>
                <td>{{ $variant->size->size_name ?? 'N/A' }}</td>
                <td>
                    <span style="background-color: {{ $variant->color->color_code ?? '#000' }}; width: 20px; height: 20px; display: inline-block;"></span>
                </td>
                <td>{{ number_format($variant->price, 0, ',', '.') }} VND</td>
                <td>
                    @if($variant->discount_price)
                        <span style="color: red; font-weight: bold;">
                            {{ number_format($variant->discount_price, 0, ',', '.') }} VND
                        </span>
                        <span style="text-decoration: line-through; color: gray;">
                            {{ number_format($variant->price, 0, ',', '.') }} VND
                        </span>
                    @else
                        
                    @endif
                </td>
                <td>{{ $variant->stock_quantity }}</td>
                <td>
                    <a href="{{ route('product_variants.edit', [$product->id, $variant->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('product_variants.destroy', [$product->id, $variant->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa biến thể này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Chưa có biến thể</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
