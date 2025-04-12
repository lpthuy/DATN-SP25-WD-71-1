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
                    <form method="GET" action="{{ route('allProducts') }}" id="filter-form">
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
                                            {{ $category->name }}
                                        </label>
                                    </li>
                                    @endforeach
                                    <li>
                                        <label>
                                            <input type="radio" name="category_id" value=""
                                                {{ !request('category_id') ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            Tất cả danh mục
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
                                <label>
                                    <input type="radio" name="price_range" value="under_200k"
                                        {{ request('price_range') == 'under_200k' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    Dưới 200.000₫
                                </label><br>
                                <label>
                                    <input type="radio" name="price_range" value="200k_to_300k"
                                        {{ request('price_range') == '200k_to_300k' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    200.000₫ - 300.000₫
                                </label><br>
                                <label>
                                    <input type="radio" name="price_range" value="300k_to_400k"
                                        {{ request('price_range') == '300k_to_400k' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    300.000₫ - 400.000₫
                                </label><br>
                                <label>
                                    <input type="radio" name="price_range" value="above_500k"
                                        {{ request('price_range') == 'above_500k' ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    Trên 500.000₫
                                </label><br>
                                <label>
                                    <input type="radio" name="price_range" value=""
                                        {{ !request('price_range') ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    Tất cả giá
                                </label>
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
                                @foreach ($colors as $color)
                                <label>
                                    <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                        {{ in_array($color->id, request('colors', [])) ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    {{ $color->color_name }}
                                    <span style="background: {{ $color->color_code }}; width: 20px; height: 20px; display: inline-block;"></span>
                                </label><br>
                                @endforeach
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
                                @foreach ($sizes as $size)
                                <label>
                                    <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                        {{ in_array($size->id, request('sizes', [])) ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    {{ $size->size_name }}
                                </label><br>
                                @endforeach
                            </div>
                        </div>



                        <!-- Nút reset -->
                        <div class="group-menu">
                            <a href="{{ route('allProducts') }}" class="btn btn-secondary">Xóa bộ lọc</a>
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
                                <div class="item_product_main" data-url="{{ route('productDetail', $product->id) }}" data-id="{{ $product->id }}">
                                    <form action="{{ route('cart.add', $product->id) }}" method="post" class="variants product-action wishItem" data-cart-form enctype="multipart/form-data">
                                        @csrf
                                        <div class="product-thumbnail">
                                            <a class="image_thumb" href="{{ route('productDetail', $product->id) }}" title="{{ $product->name }}">
                                                <div class="product-image">
                                                    @php
                                                    $images = explode(',', $product->image);
                                                    $firstImage = isset($images[0]) ? trim($images[0]) : null;
                                                    @endphp
                                                    @if($firstImage)
                                                    <img class="lazy img-responsive" width="300" height="300" src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}" />
                                                    @else
                                                    <img class="lazy img-responsive" width="300" height="300" src="{{ asset('images/no-image.png') }}" alt="Không có ảnh" />
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="action-cart">
                                                <a href="javascript:void(0)" class="action btn-compare js-btn-wishlist setWishlist btn-views" data-wish="{{ $product->id }}" title="Thêm vào yêu thích">❤️</a>
                                                <a title="Xem nhanh" href="{{ route('productDetail', $product->id) }}" class="quick-view btn-views">🔍</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name">
                                                <a href="{{ route('productDetail', $product->id) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="bottom-action">
                                                <div class="price-box">
                                                    @php
                                                    $variant = $product->variants->first();
                                                    $displayPrice = $variant ? ($variant->discount_price ?? $variant->price) : ($product->discount_price ?? $product->price);
                                                    $originalPrice = $variant ? $variant->price : $product->price;
                                                    @endphp
                                                    <span class="price text-success font-weight-bold">
                                                        {{ number_format($displayPrice, 0, ',', '.') }}₫
                                                    </span>
                                                    @if($variant && $variant->discount_price && $variant->discount_price < $variant->price)
                                                        <span class="compare-price text-danger" style="text-decoration: line-through;">
                                                            {{ number_format($originalPrice, 0, ',', '.') }}₫
                                                        </span>
                                                        @elseif($product->discount_price && $product->discount_price < $product->price)
                                                            <span class="compare-price text-danger" style="text-decoration: line-through;">
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
@endsection