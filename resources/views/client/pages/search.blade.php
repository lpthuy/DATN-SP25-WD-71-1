@extends('client.layouts.main')

@section('title', 'Kết quả tìm kiếm')

@section('content')
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
                    <strong itemprop="name">Kết quả tìm kiếm</strong>
                    <meta itemprop="position" content="2" />
                </li>
            </ul>
        </div>
    </section>

    <section class="signup search-main wrap_background background_white clearfix">
        <div class="container">
            <h2 class="title-head title_search"><a href="#" class="title-box">Nhập từ khóa để tìm kiếm</a></h2>
            <div class="serachpc_searchpage section margin-bottom-20">
                <div class="searchform">
                    <form action="{{ route('search') }}" method="get" class="input-group search-bar" role="search">
                        <input type="text" name="query" value="{{ old('query', request()->query('query')) }}" autocomplete="off" placeholder="Tìm kiếm..." class="input-group-field auto-search" fdprocessedid="jxaqnb">
                        <button type="submit" class="btn icon-fallback-text" fdprocessedid="9ynvd">
                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
                        </button>
                    </form>
                </div>

                <!-- Hiển thị kết quả tìm kiếm -->
                @if(isset($products))
                    <div class="search-results">
                        <h3>Kết quả tìm kiếm cho: "{{ $query }}"</h3>

                        @if($products->isEmpty())
                            <p>Không tìm thấy sản phẩm nào phù hợp.</p>
                        @else
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($products as $product)
                                        <div class="swiper-slide">
                                            <div class="item_product_main" data-url="{{ route('productDetail', $product->id) }}"
                                                data-id="{{ $product->id }}">
                                                <form action="{{ route('cart.add', $product->id) }}" method="post"
                                                    class="variants product-action wishItem" data-cart-form
                                                    data-id="product-actions-{{ $product->id }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="product-thumbnail">
                                                        <a class="image_thumb" href="{{ route('productDetail', $product->id) }}"
                                                            title="{{ $product->name }}">
                                                            <div class="product-image">
                                                                @php
                                                                    $images = explode(',', $product->image); // Tách ảnh thành mảng
                                                                    $firstImage = isset($images[0]) ? trim($images[0]) : null; // Lấy ảnh đầu tiên
                                                                @endphp
                                                                @if($firstImage)
                                                                    <img class="lazy img-responsive" width="300" height="300"
                                                                        src="{{ asset('storage/' . $firstImage) }}"
                                                                        alt="{{ $product->name }}" />
                                                                @else
                                                                    <img class="lazy img-responsive" width="300" height="300"
                                                                        src="{{ asset('images/no-image.png') }}"
                                                                        alt="Không có ảnh" />
                                                                @endif
                                                            </div>
                                                        </a>
                                                        <div class="action-cart">
                                                            <a href="javascript:void(0)"
                                                                class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                                data-wish="{{ $product->id }}" tabindex="0"
                                                                title="Thêm vào yêu thích">
                                                                ❤️
                                                            </a>

                                                            <a title="Xem nhanh"
                                                                href="{{ route('productDetail', $product->id) }}"
                                                                class="quick-view btn-views">
                                                                🔍
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="lofi-product">
                                                            <div class="product-type"></div>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="{{ route('productDetail', $product->id) }}"
                                                                title="{{ $product->name }}">
                                                                {{ $product->name }}
                                                            </a>
                                                        </h3>
                                                        <div class="bottom-action">
                                                            <div class="price-box">
                                                                @if($product->discount_price && $product->discount_price < $product->price)
                                                                    <span class="price text-success font-weight-bold">
                                                                        {{ number_format($product->discount_price, 0, ',', '.') }}₫
                                                                    </span>
                                                                    <span class="compare-price text-danger"
                                                                        style="text-decoration: line-through;">
                                                                        {{ number_format($product->price, 0, ',', '.') }}₫
                                                                    </span>
                                                                @else
                                                                    @php
                                                                        $variant = $product->variants->first(); // Lấy một biến thể đầu tiên
                                                                    @endphp

                                                                    @if($variant)
                                                                        <div class="price-box">
                                                                            @if($variant->discount_price && $variant->discount_price < $variant->price)
                                                                                <span class="price text-success font-weight-bold">
                                                                                    {{ number_format($variant->discount_price, 0, ',', '.') }}₫
                                                                                </span>
                                                                                <span class="compare-price text-danger"
                                                                                    style="text-decoration: line-through;">
                                                                                    {{ number_format($variant->price, 0, ',', '.') }}₫
                                                                                </span>
                                                                            @else
                                                                                <span class="price font-weight-bold">
                                                                                    {{ number_format($variant->price, 0, ',', '.') }}₫
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Phân trang -->
                            {{ $products->links() }}
                        @endif
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .search-results {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .swiper-container {
            padding: 20px 0;
        }

        .search-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .search-item h4 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .search-item p {
            margin: 0 0 10px 0;
            color: #666;
        }
    </style>
@endsection

@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });
    </script>
@endsection