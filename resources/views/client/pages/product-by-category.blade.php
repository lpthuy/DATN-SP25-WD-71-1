@extends('client.layouts.main')

@section('title', ($category->name ?? 'Tất cả sản phẩm'))

@section('content')
<div class="layout-collection">
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="{{ route('home') }}" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                        <meta itemprop="position" content="1" />
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        {{ optional($category)->name ?? 'Tất cả sản phẩm' }}
                    </span>
                </li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <aside class="left-sidebar sidebar dqdt-sidebar col-lg-3 col-12">
                <div class="sidebar">
                    <!-- Form lọc -->
                    <form method="GET" action="{{ route('products.all') }}" id="filter-form">
                        <!-- Lọc danh mục -->
                        <div class="group-menu">
                            <div class="collection_title title_block">
                                <h2>Danh mục sản phẩm</h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                    @foreach ($categories as $category)
                                    <li>
                                        <label>
                                            <input type="radio" name="category_id" value="{{ $category->id }}"
                                                {{ request('category_id') == $category->id ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>{{ $category->name }}</strong>
                                        </label>
                                    </li>
                                    @endforeach
                                    <li>
                                        <label>
                                            <input type="radio" name="category_id" value=""
                                                {{ !request('category_id') ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>Tất cả danh mục</strong>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Lọc khoảng giá -->
                        <div class="group-menu">
                            <div class="collection_title title_block">
                                <h2>Khoảng giá</h2>
                            </div>
                            <div class="layered-price">
                                <ul class="menuList-links">
                                    <li>
                                        <label>
                                            <input type="radio" name="price_range" value="under_200k"
                                                {{ request('price_range') == 'under_200k' ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>Dưới 200.000₫</strong>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="price_range" value="200k_to_300k"
                                                {{ request('price_range') == '200k_to_300k' ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>200.000₫ - 300.000₫</strong>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="price_range" value="300k_to_400k"
                                                {{ request('price_range') == '300k_to_400k' ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>300.000₫ - 400.000₫</strong>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="price_range" value="above_500k"
                                                {{ request('price_range') == 'above_500k' ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>Trên 500.000₫</strong>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="price_range" value=""
                                                {{ !request('price_range') ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>Tất cả giá</strong>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <!-- Lọc màu sắc -->
                        <div class="group-menu">
                            <div class="collection_title title_block">
                                <h2>Màu sắc</h2>
                            </div>
                            <div class="layered-color">
                                @php
                                $colors = \App\Models\Color::all();
                                @endphp
                                <ul class="menuList-links">
                                    @foreach ($colors as $color)
                                    <li>
                                        <label>
                                            <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                                {{ in_array($color->id, request('colors', [])) ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>{{ $color->color_name }}</strong>
                                            <span
                                                style="background: {{ $color->color_code }}; width: 20px; height: 20px; display: inline-block; border: 1px solid #ccc; margin-left: 5px;"></span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Lọc kích thước -->
                        <div class="group-menu">
                            <div class="collection_title title_block">
                                <h2>Kích thước</h2>
                            </div>
                            <div class="layered-size">
                                @php
                                $sizes = \App\Models\Size::all();
                                @endphp
                                <ul class="menuList-links" style="list-style: none; padding: 0; margin: 0;">
                                    @foreach ($sizes as $size)
                                    <li style="border-bottom: 1px dashed #ccc; padding: 8px 0;">
                                        <label style="font-weight: 600;">
                                            <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                                {{ in_array($size->id, request('sizes', [])) ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <strong>{{ $size->size_name }}</strong>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>





                        <!-- Nút reset -->
                        <div class="group-menu">
                            <a href="{{ route('products.all') }}" class="btn btn-secondary"
                                style="font-weight: bold;">Xóa bộ lọc</a>

                        </div>
                    </form>
                </div>
            </aside>

            <section class="main_container collection col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="category-products products category-products-grids clearfix">
                    <div class="products-view products-view-grid list_hover_pro">
                        <div class="row">
                            @if ($products->count() > 0)
                            @foreach ($products as $product)
                            <div class="col-6 col-md-4">
                                <div class="item_product_main" data-url="{{ route('productDetail', $product->id) }}"
                                    data-id="{{ $product->id }}">
                                    <form action="{{ route('cart.add', $product->id) }}" method="post"
                                        class="variants product-action wishItem" data-cart-form
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="product-thumbnail">
                                            <a class="image_thumb" href="{{ route('productDetail', $product->id) }}"
                                                title="{{ $product->name }}">
                                                <div class="product-image">
                                                    @php
                                                    $images = explode(',', $product->image);
                                                    $firstImage = isset($images[0]) ? trim($images[0]) : null;
                                                    @endphp
                                                    @if($firstImage)
                                                    <img class="lazy img-responsive" width="300" height="300"
                                                        src="{{ asset('storage/' . $firstImage) }}"
                                                        alt="{{ $product->name }}" />
                                                    @else
                                                    <img class="lazy img-responsive" width="300" height="300"
                                                        src="{{ asset('images/no-image.png') }}" alt="Không có ảnh" />
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="action-cart">

                                                <a title="Xem nhanh" href="{{ route('productDetail', $product->id) }}"
                                                    class="quick-view btn-views">🔍</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name">
                                                <a href="{{ route('productDetail', $product->id) }}"
                                                    title="{{ $product->name }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="bottom-action">
                                                <div class="price-box">
                                                    @php
                                                    $variant = $product->variants->first();
                                                    $displayPrice = $variant ? ($variant->discount_price ??
                                                    $variant->price) : ($product->discount_price ?? $product->price);
                                                    $originalPrice = $variant ? $variant->price : $product->price;
                                                    @endphp
                                                    <span class="price text-success font-weight-bold">
                                                        {{ number_format($displayPrice, 0, ',', '.') }}₫
                                                    </span>
                                                    @if($variant && $variant->discount_price && $variant->discount_price
                                                    < $variant->price)
                                                        <span class="compare-price text-danger"
                                                            style="text-decoration: line-through;">
                                                            {{ number_format($originalPrice, 0, ',', '.') }}₫
                                                        </span>
                                                        @elseif($product->discount_price && $product->discount_price <
                                                            $product->price)
                                                            <span class="compare-price text-danger"
                                                                style="text-decoration: line-through;">
                                                                {{ number_format($originalPrice, 0, ',', '.') }}₫
                                                            </span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>Không có sản phẩm nào.</p>
                            @endif
                        </div>
                    </div>
                    <div class="pagenav">
                        <nav class="text-center nav_pagi">
                            <!-- Hiển thị phân trang -->
                            {{ $products->appends(request()->query())->links() }}
                        </nav>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div id="open-filters" class="open-filters d-lg-none d-block">
    <span class="fter"></span>
</div>
<style>
.layered-color label {
    display: flex;
    align-items: center;
    font-weight: 500;
    margin-bottom: 8px;
}

.layered-color label span {
    display: inline-block;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    margin-left: 8px;
    border: 1px solid #ccc;
}

.layered-size label {
    text-transform: uppercase;
    font-weight: 500;
    display: inline-block;
    margin-bottom: 6px;
}
</style>

@endsection