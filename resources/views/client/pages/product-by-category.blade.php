@extends('client.layouts.main')

@section('title', 'Sản phẩm áo')

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
                        <strong>
                            <span itemprop="name">Tất cả sản phẩm</span>
                            <meta itemprop="position" content="2" />
                        </strong>
                    </li>
                </ul>
            </div>
        </section>
        {{-- <section class="section_coupons">
            <div class="container">
                <div class="coupon-initial">
                    <div class="listCoupon">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-4 coupon-item">
                            <div class="coupon-item__inner">
                                <div class="coupon-item__right">
                                    <div class="cp-top">
                                        <div class="cp-top-title">
                                            <h3>Miễn phí vận chuyển</h3>
                                            <p>Đơn hàng từ 300k</p>
                                        </div>
                                        <div class="cp-top-detail">
                                            <p>Mã: <strong>LOFIFREESHIP</strong></p>
                                            <p>HSD: 08/03/2023</p>
                                        </div>
                                    </div>
                                    <div class="cp-bottom">
                                        <div class="cp-bottom-btn">
                                            <button class="dis_copy_2" data-copy="LOFIFREESHIP">Sao
                                                chép</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 col-xl-4 coupon-item">
                            <div class="coupon-item__inner">
                                <div class="coupon-item__right">
                                    <div class="cp-top">
                                        <div class="cp-top-title">
                                            <h3>Giảm 20%</h3>
                                            <p>Đơn hàng từ 200k</p>
                                        </div>
                                        <div class="cp-top-detail">
                                            <p>Mã: <strong>LOFI20</strong></p>
                                            <p>HSD: 13/05/2023</p>
                                        </div>
                                    </div>
                                    <div class="cp-bottom">
                                        <div class="cp-bottom-btn">
                                            <button class="dis_copy_2" data-copy="LOFI20">Sao chép</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 col-xl-4 coupon-item">
                            <div class="coupon-item__inner">
                                <div class="coupon-item__right">
                                    <div class="cp-top">
                                        <div class="cp-top-title">
                                            <h3>Giảm 30%</h3>
                                            <p>Đơn hàng từ 500k</p>
                                        </div>
                                        <div class="cp-top-detail">
                                            <p>Mã: <strong>LOFI30</strong></p>
                                            <p>HSD: 13/05/2023</p>
                                        </div>
                                    </div>
                                    <div class="cp-bottom">
                                        <div class="cp-bottom-btn">
                                            <button class="dis_copy_2" data-copy="LOFI30">Sao chép</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="awe-section-4">
            <section class="section_coupons">
                <div class="container">
                    <div class="coupon-initial">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($promotions as $promo)
                                    <div class="swiper-slide coupon-item">
                                        <div class="coupon-item__inner">
                                            <div class="coupon-item__right">
                                                <div class="cp-top">
                                                    <div class="cp-top-title">
                                                        <h3>{{ $promo->discount_type == 'percentage' ? 'Giảm ' . $promo->discount_value . '%' : 'Giảm ' . number_format($promo->discount_value) . '₫' }}</h3>
                                                        <p>Đơn hàng từ {{ number_format($promo->min_purchase_amount) }}₫</p>
                                                    </div>
                                                    <div class="cp-top-detail">
                                                        <p>Mã: <strong>{{ $promo->code }}</strong></p>
                                                        <p>HSD: {{ \Carbon\Carbon::parse($promo->end_date)->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>
                                                <div class="cp-bottom">
                                                    <div class="cp-bottom-btn">
                                                        <button class="dis_copy_2" data-copy="{{ $promo->code }}">Sao chép</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div> <!-- Vẫn giữ phân trang -->
                        </div>
                    </div>
                </div>
            </section>
        </section>
        
        <div class="container">
            <div class="row">
                <aside class="left-sidebar sidebar dqdt-sidebar col-lg-3 col-12">
                    <div class="sidebar">
                        <div class="group-menu">
                            <div class="collection_title title_block">
                                <h2>Danh mục sản phẩm</h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                  
                                    <li class="nav-item has-submenu">
                                       
                                        <i class="fa ic-caret-down"></i>
                                        <ul class="menuList-submain level-1">
                                            @foreach ($categories as $category)
                                                <li class="has-submenu">
                                                    <a class="caret-down" href="{{ route('productbycategory', ['id' => $category->id]) }}" title="{{ $category->name }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="aside-filter clearfix">
                        <div class="aside-hidden-mobile">
                            <div class="filter-container">
                                <div class="filter-containers">
                                    <div class="filter-container__selected-filter" style="display: none;">
                                        <div class="filter-container__selected-filter-header clearfix">
                                            <span class="filter-container__selected-filter-header-title">Bạn
                                                chọn</span>
                                            <a href="javascript:void(0)" onclick="clearAllFiltered()"
                                                class="filter-container__clear-all" title="Bỏ hết">Bỏ hết</a>
                                        </div>
                                        <div class="filter-container__selected-filter-list clearfix">
                                            <ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                              
                                <aside class="aside-item filter-tag-style-1 tag-size">
                                    <div class="aside-title">Size
                                        <span class="nd-svg collapsible-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5"
                                                viewBox="0 0 10 5" fill="none">
                                                <path
                                                    d="M0.993164 0.968199L5.0001 4.97514L9.00704 0.968201L8.06423 0.0253911L5.0001 3.08952L1.93597 0.0253906L0.993164 0.968199Z"
                                                    fill="#333333" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="aside-content filter-group">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label for="filter-s">
                                                    <input type="checkbox" id="filter-s" onchange="toggleFilter(this)"
                                                        data-group="tag1" data-field="tags" data-text="S"
                                                        value="(S)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    S
                                                </label>
                                            </li>

                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label for="filter-m">
                                                    <input type="checkbox" id="filter-m" onchange="toggleFilter(this)"
                                                        data-group="tag1" data-field="tags" data-text="M"
                                                        value="(M)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    M
                                                </label>
                                            </li>

                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label for="filter-l">
                                                    <input type="checkbox" id="filter-l" onchange="toggleFilter(this)"
                                                        data-group="tag1" data-field="tags" data-text="L"
                                                        value="(L)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    L
                                                </label>
                                            </li>

                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label for="filter-xl">
                                                    <input type="checkbox" id="filter-xl" onchange="toggleFilter(this)"
                                                        data-group="tag1" data-field="tags" data-text="XL"
                                                        value="(XL)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    XL
                                                </label>
                                            </li>

                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label for="filter-xxl">
                                                    <input type="checkbox" id="filter-xxl" onchange="toggleFilter(this)"
                                                        data-group="tag1" data-field="tags" data-text="XXL"
                                                        value="(XXL)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    XXL
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>

                                <aside class="aside-item filter-tag-style-1 tag-color">
                                    <div class="aside-title">Màu sắc
                                        <span class="nd-svg collapsible-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5"
                                                viewBox="0 0 10 5" fill="none">
                                                <path
                                                    d="M0.993164 0.968199L5.0001 4.97514L9.00704 0.968201L8.06423 0.0253911L5.0001 3.08952L1.93597 0.0253906L0.993164 0.968199Z"
                                                    fill="#333333" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="aside-content filter-group">
                                        <ul>
                                            <li class="filter-item color filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-do">
                                                        <input type="checkbox" id="filter-do"
                                                            onchange="toggleFilter(this)" data-group="tag1"
                                                            data-field="tags" data-text="Đỏ" value="(&#34;Đỏ&#34;)"
                                                            data-operator="OR">
                                                        <i class="fa do" style="background-color:#f20808;"></i>
                                                        <span class="d-none">Đỏ</span>
                                                    </label>
                                                </span>
                                            </li>

                                            <li class="filter-item color filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-cam">
                                                        <input type="checkbox" id="filter-cam"
                                                            onchange="toggleFilter(this)" data-group="tag1"
                                                            data-field="tags" data-text="Cam" value="(&#34;Cam&#34;)"
                                                            data-operator="OR">
                                                        <i class="fa cam" style="background-color:#f3b426;"></i>
                                                        <span class="d-none">Cam</span>
                                                    </label>
                                                </span>
                                            </li>

                                            <li class="filter-item color filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-tim">
                                                        <input type="checkbox" id="filter-tim"
                                                            onchange="toggleFilter(this)" data-group="tag1"
                                                            data-field="tags" data-text="Tím" value="(&#34;Tím&#34;)"
                                                            data-operator="OR">
                                                        <i class="fa tim" style="background-color:#c500ff;"></i>
                                                        <span class="d-none">Tím</span>
                                                    </label>
                                                </span>
                                            </li>

                                            <li class="filter-item color filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-xam">
                                                        <input type="checkbox" id="filter-xam"
                                                            onchange="toggleFilter(this)" data-group="tag1"
                                                            data-field="tags" data-text="Xám" value="(&#34;Xám&#34;)"
                                                            data-operator="OR">
                                                        <i class="fa xam" style="background-color:#615a5a;"></i>
                                                        <span class="d-none">Xám</span>
                                                    </label>
                                                </span>
                                            </li>

                                            <li class="filter-item color filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-den">
                                                        <input type="checkbox" id="filter-den"
                                                            onchange="toggleFilter(this)" data-group="tag1"
                                                            data-field="tags" data-text="Đen" value="(&#34;Đen&#34;)"
                                                            data-operator="OR">
                                                        <i class="fa den" style="background-color:#000;"></i>
                                                        <span class="d-none">Đen</span>
                                                    </label>
                                                </span>
                                            </li>

                                            <li class="filter-item color filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-trang">
                                                        <input type="checkbox" id="filter-trang"
                                                            onchange="toggleFilter(this)" data-group="tag1"
                                                            data-field="tags" data-text="Trắng" value="(&#34;Trắng&#34;)"
                                                            data-operator="OR">
                                                        <i class="fa trang"
                                                            style="background-color:#fff;border:1px solid #ebebeb;"></i>
                                                        <span class="d-none">Trắng</span>
                                                    </label>
                                                </span>
                                            </li>
                                        </ul>

                                    </div>
                                </aside>

                                <aside class="aside-item filter-price">
                                    <div class="aside-title">Chọn mức giá:
                                        <span class="nd-svg collapsible-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5"
                                                viewBox="0 0 10 5" fill="none">
                                                <path
                                                    d="M0.993164 0.968199L5.0001 4.97514L9.00704 0.968201L8.06423 0.0253911L5.0001 3.08952L1.93597 0.0253906L0.993164 0.968199Z"
                                                    fill="#333333" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="aside-content filter-group">
                                        <ul>

                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-duoi-200-000d">
                                                        <input type="checkbox" id="filter-duoi-200-000d"
                                                            onchange="toggleFilter(this);" data-group="Khoảng giá"
                                                            data-field="price_min" data-text="Dưới 200.000đ"
                                                            value="(<200000)" data-operator="OR">
                                                        <i class="fa"></i>
                                                        Giá dưới 200.000đ
                                                    </label>
                                                </span>
                                            </li>







                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-200-000d-300-000d">
                                                        <input type="checkbox" id="filter-200-000d-300-000d"
                                                            onchange="toggleFilter(this)" data-group="Khoảng giá"
                                                            data-field="price_min" data-text="200.000đ - 300.000đ"
                                                            value="(>200000 AND <300000)" data-operator="OR">
                                                        <i class="fa"></i>
                                                        200.000đ - 300.000đ
                                                    </label>
                                                </span>
                                            </li>






                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-300-000d-400-000d">
                                                        <input type="checkbox" id="filter-300-000d-400-000d"
                                                            onchange="toggleFilter(this)" data-group="Khoảng giá"
                                                            data-field="price_min" data-text="300.000đ - 400.000đ"
                                                            value="(>300000 AND <400000)" data-operator="OR">
                                                        <i class="fa"></i>
                                                        300.000đ - 400.000đ
                                                    </label>
                                                </span>
                                            </li>






                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-400-000d-500-000d">
                                                        <input type="checkbox" id="filter-400-000d-500-000d"
                                                            onchange="toggleFilter(this)" data-group="Khoảng giá"
                                                            data-field="price_min" data-text="400.000đ - 500.000đ"
                                                            value="(>400000 AND <500000)" data-operator="OR">
                                                        <i class="fa"></i>
                                                        400.000đ - 500.000đ
                                                    </label>
                                                </span>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <span>
                                                    <label for="filter-tren500-000d">
                                                        <input type="checkbox" id="filter-tren500-000d"
                                                            onchange="toggleFilter(this)" data-group="Khoảng giá"
                                                            data-field="price_min" data-text="Trên 500.000đ"
                                                            value="(>500000)" data-operator="OR">
                                                        <i class="fa"></i>
                                                        Giá trên 500.000đ
                                                    </label>
                                                </span>
                                            </li>



                                        </ul>
                                    </div>
                                </aside>

                            </div>
                        </div>
                    </div>

                </aside>
                <section class="main_container collection col-lg-9 col-md-12 col-sm-12 col-12">

                    <div class="sortPagiBar d-flex">
                        <div class="collection-title">
                            <h1>Tất cả sản phẩm</h1>
                        </div>
                        <div class="sort-cate clearfix">
                            <div id="sort-by">
                                <label class="left">Sắp xếp theo</label>
                                <ul class="ul_col">
                                    <li>
                                        <span>
                                            Mặc định
                                        </span>
                                        <ul class="content_ul">
                                            <li><a href="javascript:;" onclick="sortby('default')">Mặc định</a>
                                            </li>
                                            <li><a href="javascript:;" onclick="sortby('alpha-asc')">A &rarr;
                                                    Z</a></li>
                                            <li><a href="javascript:;" onclick="sortby('alpha-desc')">Z &rarr;
                                                    A</a></li>
                                            <li><a href="javascript:;" onclick="sortby('price-asc')">Giá tăng
                                                    dần</a></li>
                                            <li><a href="javascript:;" onclick="sortby('price-desc')">Giá giảm
                                                    dần</a></li>
                                            <li><a href="javascript:;" onclick="sortby('created-desc')">Hàng mới
                                                    nhất</a></li>
                                            <li><a href="javascript:;" onclick="sortby('created-asc')">Hàng cũ
                                                    nhất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="category-products products category-products-grids clearfix">
                        <div class="products-view products-view-grid list_hover_pro">
                            <div class="row">
                                @if ($products->count() > 0)
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-6 col-md-4">
                                                <div class="item_product_main" data-url="{{ route('productDetail', $product->id) }}" data-id="{{ $product->id }}">
                                                    <form action="{{ route('cart.add', $product->id) }}" method="post" class="variants product-action wishItem" data-cart-form enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="product-thumbnail sale">
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
                                                                    @if($product->discount_price && $product->discount_price < $product->price)
                                                                        <span class="price text-success font-weight-bold">
                                                                            {{ number_format($product->discount_price, 0, ',', '.') }}₫
                                                                        </span>
                                                                        <span class="compare-price text-danger" style="text-decoration: line-through;">
                                                                            {{ number_format($product->price, 0, ',', '.') }}₫
                                                                        </span>
                                                                    @else
                                                                        @php
                                                                            $variant = $product->variants->first();
                                                                        @endphp
                                                                        @if($variant)
                                                                            @if($variant->discount_price && $variant->discount_price < $variant->price)
                                                                                <span class="price text-success font-weight-bold">
                                                                                    {{ number_format($variant->discount_price, 0, ',', '.') }}₫
                                                                                </span>
                                                                                <span class="compare-price text-danger" style="text-decoration: line-through;">
                                                                                    {{ number_format($variant->price, 0, ',', '.') }}₫
                                                                                </span>
                                                                            @else
                                                                                <span class="price font-weight-bold">
                                                                                    {{ number_format($variant->price, 0, ',', '.') }}₫
                                                                                </span>
                                                                            @endif
                                                                        @else
                                                                            <span class="price font-weight-bold">
                                                                                {{ number_format($product->price, 0, ',', '.') }}₫
                                                                            </span>
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
                                @else
                                    <p>Không có sản phẩm nào.</p>
                                @endif
                            </div>
                        </div>
                        <div class="pagenav">
                            <nav class="text-center nav_pagi">
                                <!-- Hiển thị phân trang -->
                                {{ $products->links() }}
                            </nav>
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>
    </div>
    <div id="open-filters" class="open-filters d-lg-none d-block">
        <span class="fter">
        </span>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.dis_copy_2', function(e) {
            e.preventDefault();
            var copyText = $(this).attr('data-copy');
            var copyTextarea = document.createElement("textarea");
            copyTextarea.textContent = copyText;
            document.body.appendChild(copyTextarea);
            copyTextarea.select();
            document.execCommand("copy");
            document.body.removeChild(copyTextarea);
            var cur_text = $(this).text();
            var $cur_btn = $(this);
            $(this).addClass("disabled");
            $(this).text("Đã lưu");
            $(this).parent().addClass('active');
            setTimeout(function() {
                $cur_btn.removeClass("disabled");
                $cur_btn.parent().removeClass('active');
                $cur_btn.text(cur_text);
            }, 2500)
        })
    </script>
    <script>
        var Ego = {};
        var selectedSortby;
        var tt = 'Thứ tự';
        var selectedViewData = "data";
        var filter = new Bizweb.SearchFilter()

        function toggleFilter(e) {
            _toggleFilter(e);
            renderFilterdItems();
            doSearch(1);
        }

        function _toggleFilterdqdt(e) {
            var $element = $(e);
            var group = 'Khoảng giá';
            var field = 'price_min';
            var operator = 'OR';
            var value = $element.attr("data-value");
            filter.deleteValuedqdt(group, field, value, operator);
            filter.addValue(group, field, value, operator);
            renderFilterdItems();
            doSearch(1);
        }

        function _toggleFilter(e) {
            var $element = $(e);
            var group = $element.attr("data-group");
            var field = $element.attr("data-field");
            var text = $element.attr("data-text");
            var value = $element.attr("value");
            var operator = $element.attr("data-operator");
            var filterItemId = $element.attr("id");

            if (!$element.is(':checked')) {
                filter.deleteValue(group, field, value, operator);
            } else {
                filter.addValue(group, field, value, operator);
            }

            $(".catalog_filters li[data-handle='" + filterItemId + "']").toggleClass("active");
        }

        function renderFilterdItems() {
            var $container = $(".filter-container__selected-filter-list ul");
            $container.html("");

            $(".filter-container input[type=checkbox]").each(function(index) {
                if ($(this).is(':checked')) {
                    var id = $(this).attr("id");
                    var name = $(this).closest("label").text();
                    addFilteredItem(name, id);
                }
            });

            if ($(".aside-content input[type=checkbox]:checked").length > 0)
                $(".filter-container__selected-filter").show();
            else
                $(".filter-container__selected-filter").hide();
        }

        function addFilteredItem(name, id) {
            var filteredItemTemplate =
                "<li class='filter-container__selected-filter-item' for='{3}'><a href='javascript:void(0)' onclick=\"{0}\"><i class='fa'></i> {1}</a></li>";
            filteredItemTemplate = filteredItemTemplate.replace("{0}", "removeFilteredItem('" + id + "')");
            filteredItemTemplate = filteredItemTemplate.replace("{1}", name);
            filteredItemTemplate = filteredItemTemplate.replace("{3}", id);
            var $container = $(".filter-container__selected-filter-list ul");
            $container.append(filteredItemTemplate);
        }

        function removeFilteredItem(id) {
            $(".filter-container #" + id).trigger("click");
        }

        function filterItemInList(object) {
            q = object.val().toLowerCase();
            object.parent().next().find('li').show();
            if (q.length > 0) {
                object.parent().next().find('li').each(function() {
                    if ($(this).find('label').attr("data-filter").indexOf(q) == -1)
                        $(this).hide();
                })
            }
        }

        function clearAllFiltered() {
            filter = new Bizweb.SearchFilter();


            $(".filter-container__selected-filter-list ul").html("");
            $(".filter-container input[type=checkbox]").attr('checked', false);
            $(".filter-container__selected-filter").hide();

            doSearch(1);
        }

        function doSearch(page, options) {
            if (!options) options = {};
            //NProgress.start();
            $('.aside.aside-mini-products-list.filter').removeClass('active');
            awe_showPopup('.loading');
            filter.search({
                view: selectedViewData,
                page: page,
                sortby: selectedSortby,
                success: function(html) {
                    var $html = $(html);
                    // Muốn thay thẻ DIV nào khi filter thì viết như này
                    var $categoryProducts = $($html[0]);
                    $(".category-products").html($categoryProducts.html());
                    pushCurrentFilterState({
                        sortby: selectedSortby,
                        page: page
                    });
                    awe_hidePopup('.loading');
                    awe_lazyloadImage();
                    Ego.Wishlist.wishlistProduct();

                    var modal = $('.quickview-product');
                    var btn = $('.quick-view');
                    var span = $('.quickview-close');

                    btn.click(function() {
                        modal.show();
                    });

                    span.click(function() {
                        modal.hide();
                    });

                    $(window).on('click', function(e) {
                        if ($(e.target).is('.modal')) {
                            modal.hide();
                        }
                    });

                    $(".swatch").each(function(index, elem) {
                        var scrapImg = $(this).find(".swatch-element");
                        if (scrapImg.length > 3) {
                            var number = scrapImg.length - 3;
                            $(this).attr('number', number);
                            $(this).append('<span class="btn-num">+' + number + '</span>');
                            console.log($(this), number);
                        }

                    });
                    $(".col-item .thumbs-list .thumbs-list-item img").hover(function() {
                        var t = $(this).attr("data-img");
                        $(this).parent().siblings().removeClass("active"), $(this).parent().addClass(
                            "active");
                        var e = $(this).parents(".col-item").find(".product-thumb img");
                        e && $(e).attr("src", t);
                    });
                    $('.add_to_cart').click(function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var form = $this.parents('form');
                        $.ajax({
                            type: 'POST',
                            url: '/cart/add.js',
                            async: false,
                            data: form.serialize(),
                            dataType: 'json',
                            beforeSend: function() {},
                            success: function(line_item) {
                                $('.cart-popup-name').html(line_item.title).attr('href',
                                    line_item.url, 'title', line_item.title);
                                ajaxCart.load();
                                $('#popup-cart-desktop, .cart-sidebar, .backdrop__body-backdrop___1rvky')
                                    .addClass('active');
                            },
                            cache: false
                        });
                    });
                    $('html, body').animate({
                        scrollTop: $('.category-products').offset().top
                    }, 0);
                    resortby(selectedSortby);
                    if (window.BPR !== undefined) {
                        return window.BPR.initDomEls(), window.BPR.loadBadges();
                    }
                }
            });
        }

        function sortby(sort) {
            $('.sort-cate-left li').removeClass('active');
            switch (sort) {
                case "price-asc":
                    selectedSortby = "price_min:asc";
                    break;
                case "price-desc":
                    selectedSortby = "price_min:desc";
                    break;
                case "alpha-asc":
                    selectedSortby = "name:asc";
                    break;
                case "alpha-default":
                    selectedSortby = "name:default";
                    break;
                case "alpha-desc":
                    selectedSortby = "name:desc";
                    break;
                case "created-desc":
                    selectedSortby = "created_on:desc";
                    break;
                case "created-asc":
                    selectedSortby = "created_on:asc";
                    break;
                default:
                    selectedSortby = "";
                    break;
            }

            doSearch(1);
        }

        function resortby(sort) {
            switch (sort) {
                case "price_min:asc":
                    tt = "Giá tăng dần";
                    $('.sort-cate-left .price-asc').addClass("active");
                    break;
                case "price_min:desc":
                    tt = "Giá giảm dần";
                    $('.sort-cate-left .price-desc').addClass("active");
                    break;
                case "name:asc":
                    tt = "A → Z";
                    $('.sort-cate-left .alpha-asc').addClass("active");
                    break;
                case "name:default":
                    tt = "Mặc định";
                    $('.sort-cate-left .alpha-default').addClass("active");
                    break;
                case "name:desc":
                    tt = "Z → A";
                    $('.sort-cate-left .alpha-desc').addClass("active");
                    break;
                case "created_on:desc":
                    tt = "Hàng mới nhất";
                    $('.sort-cate-left .position-desc').addClass("active");
                    break;
                case "created_on:asc":
                    tt = "Hàng cũ nhất";
                    break;
                default:
                    tt = "Mặc định";
                    $('.sort-cate-left .default').addClass("active");
                    break;
            }
            $('#sort-by > ul > li > span').html(tt);
        }

        function _selectSortby(sort) {
            resortby(sort);
            switch (sort) {
                case "price-asc":
                    selectedSortby = "price_min:asc";
                    break;
                case "price-desc":
                    selectedSortby = "price_min:desc";
                    break;
                case "alpha-asc":
                    selectedSortby = "name:asc";
                    break;
                case "alpha-default":
                    selectedSortby = "name:default";
                    break;
                case "alpha-desc":
                    selectedSortby = "name:desc";
                    break;
                case "created-desc":
                    selectedSortby = "created_on:desc";
                    break;
                case "created-asc":
                    selectedSortby = "created_on:asc";
                    break;
                default:
                    selectedSortby = sort;
                    break;
            }
        }

        function toggleCheckbox(id) {
            $(id).click();
        }

        function pushCurrentFilterState(options) {
            if (!options) options = {};
            var url = filter.buildSearchUrl(options);
            var queryString = url.slice(url.indexOf('?'));
            if (selectedViewData == 'data_list') {
                queryString = queryString + '&view=list';
            } else {
                queryString = queryString + '&view=grid';
            }
            pushState(queryString);
        }

        function pushState(url) {
            window.history.pushState({
                turbolinks: true,
                url: url
            }, null, url)
        }

        function switchView(view) {
            switch (view) {
                case "list":
                    selectedViewData = "data_list";
                    break;
                default:
                    selectedViewData = "data";
                    break;
            }
            var url = window.location.href;
            var page = getParameter(url, "page");
            if (page != '' && page != null) {
                doSearch(page);
            } else {
                doSearch(1);
            }
        }

        function selectFilterByCurrentQuery() {
            awe_lazyloadImage();
            var isFilter = false;
            var url = window.location.href;
            var queryString = decodeURI(window.location.search);
            var filters = queryString.match(/\(.*?\)/g);
            var page = 0;
            if (queryString) {
                isFilter = true;
                $.urlParam = function(name) {
                    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                    return results[1] || 0;
                }
                page = $.urlParam('page');
            }
            if (filters && filters.length > 0) {
                filters.forEach(function(item) {
                    item = item.replace(/\(\(/g, "(");
                    var element = $(".aside-content input[value='" + item + "']");
                    element.attr("checked", "checked");
                    _toggleFilter(element);
                });

                isFilter = true;
            }
            var sortOrder = getParameter(url, "sortby");
            if (sortOrder) {
                _selectSortby(sortOrder);
            }
            if (isFilter) {
                doSearch(page);
                renderFilterdItems();
            }
        }

        function getParameter(url, name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(url);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        $(document).ready(function() {
            $(window).on('popstate', function() {
                location.reload(true);
            });
            selectFilterByCurrentQuery();
            $('.filter-container .aside-item').click(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                } else {
                    $('.filter-container .aside-item.active').removeClass('active');
                    $(this).addClass('active');
                }
            });

            $('#show-admin-bar').click(function(e) {
                $('.aside.aside-mini-products-list.filter').toggleClass('active');
            });
            $('.filter-container__selected-filter-header-title').click(function(e) {
                $('.aside.aside-mini-products-list.filter').toggleClass('active');
            });

            $('.aside-filter .aside-hidden-mobile .aside-item .aside-title').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                $this.parents('.aside-filter .aside-hidden-mobile .aside-item').find('.aside-content')
                .stop().slideToggle();
                $(this).toggleClass('active');
                return false;
            });
            $('.open-filters').click(function(e) {
                e.stopPropagation();
                $(this).toggleClass('openf');
                $('.dqdt-sidebar').toggleClass('openf');
                $('.backdrop__body-backdrop___1rvky').toggleClass('active');
            });
            $('.backdrop__body-backdrop___1rvky').click(function(e) {
                $('.backdrop__body-backdrop___1rvky').removeClass('active');
                $('.dqdt-sidebar, .open-filters').removeClass('openf')
            });


        });
    </script>
@endsection
