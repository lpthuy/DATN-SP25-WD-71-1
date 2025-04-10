@extends('client.layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-5">Sản phẩm thuộc danh mục: <strong class="text-primary">{{ $category->name }}</strong></h2>

    <div class="row">
        @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-danger fw-bold">{{ number_format($product->price) }}₫</p>
                        <a href="{{ url('san-pham/' . $product->id) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">Không có sản phẩm nào trong danh mục này.</div>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>

<style>
    .card-product {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
}

.card-product:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transform: translateY(-4px);
}

.card-product img {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    object-fit: cover;
    height: 220px;
    width: 100%;
}

.card-product .card-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

.card-product .card-title {
    font-size: 16px;
    font-weight: 600;
    min-height: 44px;
    margin-bottom: 10px;
    line-height: 1.3;
}

.card-product .btn {
    border-radius: 20px;
    font-size: 14px;
    padding: 6px 14px;
}

</style>
@endsection
