@extends('client.layouts.main')

@section('title', 'Sản phẩm')

@section('content')
    <div class="layout-collection">
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="../index.html" title="Trang chủ">
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
        <section class="section_coupons">
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
                                    <li class="nav-item ">
                                        <a class="nav-link" href="../index.html" title="Trang chủ">Trang chủ</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="../gioi-thieu.html" title="Giới thiệu">Giới
                                            thiệu</a>
                                    </li>
                                    <li class="has-submenu level0 active">
                                        <a class="nav-link" href="all.html" title="Sản phẩm">
                                            Sản phẩm
                                            <span class="icon-plus-submenu plus-nClick1"></span>
                                        </a>
                                        <ul class="submenu-links" style="display: none;">
                                            <li class="has-submenu level1 ">
                                                <a href="../san-pham-ao.html" title="Sản phẩm áo">
                                                    Sản phẩm áo
                                                    <span class="icon-plus-submenu plus-nClick2"></span>
                                                </a>
                                                <ul class="submenu-links" style="display: none;">
                                                    <li class="">
                                                        <a href="../ao-phong.html" title="Áo phông">Áo phông</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../ao-so-mi.html" title="Áo sơ mi">Áo sơ mi</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../ao-kieu.html" title="Áo kiểu">Áo kiểu</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../ao-len.html" title="Áo len">Áo len</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../ao-khoac.html" title="Áo khoác">Áo khoác</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-submenu level1 ">
                                                <a href="../san-pham-quan.html" title="Sản phẩm quần">
                                                    Sản phẩm quần
                                                    <span class="icon-plus-submenu plus-nClick2"></span>
                                                </a>
                                                <ul class="submenu-links" style="display: none;">
                                                    <li class="">
                                                        <a href="../quan-jeans.html" title="Quần jeans">Quần
                                                            jeans</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../quan-kaki.html" title="Quần kaki">Quần
                                                            kaki</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../quan-short.html" title="Quần short">Quần
                                                            short</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../quan-lung.html" title="Quần lửng">Quần
                                                            lửng</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-submenu level1 ">
                                                <a href="../san-pham-vay.html" title="Sản phẩm váy">
                                                    Sản phẩm váy
                                                    <span class="icon-plus-submenu plus-nClick2"></span>
                                                </a>
                                                <ul class="submenu-links" style="display: none;">
                                                    <li class="">
                                                        <a href="../vay-bo.html" title="Váy bó">Váy bó</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../vay-xuong.html" title="Váy xuông">Váy
                                                            xuông</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../vay-chu-a.html" title="Váy chữ A">Váy chữ
                                                            A</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="../dam-om.html" title="Đầm ôm">Đầm ôm</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-submenu level1 ">
                                                <a href="../tui-phu-kien.html" title="Túi xách">
                                                    Túi xách
                                                    <span class="icon-plus-submenu plus-nClick2"></span>
                                                </a>
                                                <ul class="submenu-links" style="display: none;">
                                                    <li class="">
                                                        <a href="../vi.html" title="Ví">Ví</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-submenu level1 ">
                                                <a href="../giay-dep.html" title="Giày dép">
                                                    Giày dép
                                                </a>
                                            </li>
                                            <li class="has-submenu level1 ">
                                                <a href="../phu-kien-1.html" title="Phụ kiện">
                                                    Phụ kiện
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="../tin-tuc.html" title="Tin tức">Tin tức</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="../lien-he.html" title="Liên hệ">Liên hệ</a>
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

                                <aside class="aside-item filter-type">
                                    <div class="aside-title">Kiểu dáng
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
                                        <ul class="filter-type">


                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="áo" for="filter-ao">
                                                    <input type="checkbox" id="filter-ao" onchange="toggleFilter(this)"
                                                        data-group="Loại" data-field="product_type.filter_key"
                                                        data-text="Áo" value="(&#34;Áo&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Áo
                                                </label>
                                            </li>



                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="đầm" for="filter-dam">
                                                    <input type="checkbox" id="filter-dam" onchange="toggleFilter(this)"
                                                        data-group="Loại" data-field="product_type.filter_key"
                                                        data-text="Đầm" value="(&#34;Đầm&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Đầm
                                                </label>
                                            </li>



                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="phụ kiện" for="filter-phu-kien">
                                                    <input type="checkbox" id="filter-phu-kien"
                                                        onchange="toggleFilter(this)" data-group="Loại"
                                                        data-field="product_type.filter_key" data-text="Phụ kiện"
                                                        value="(&#34;Phụ kiện&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Phụ kiện
                                                </label>
                                            </li>



                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="quần" for="filter-quan">
                                                    <input type="checkbox" id="filter-quan" onchange="toggleFilter(this)"
                                                        data-group="Loại" data-field="product_type.filter_key"
                                                        data-text="Quần" value="(&#34;Quần&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Quần
                                                </label>
                                            </li>



                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="váy" for="filter-vay">
                                                    <input type="checkbox" id="filter-vay" onchange="toggleFilter(this)"
                                                        data-group="Loại" data-field="product_type.filter_key"
                                                        data-text="Váy" value="(&#34;Váy&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Váy
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                </aside>

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
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="item_product_main">
                                        <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-29237846" enctype="multipart/form-data">
                                            <div class="product-thumbnail  ">
                                                <a class="image_thumb"
                                                    href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                    <div class="product-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>

                                                    <div class="product-image second-image">
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            data-src="http://bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                            alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                    </div>
                                                </a>
                                                <div class="action-cart">
                                                    <a href="javascript:void(0)"
                                                        class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                        data-wish="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        tabindex="0" title="Thêm vào yêu thích">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="17" viewBox="0 0 18 17" fill="none">
                                                            <path
                                                                d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                                stroke="#000" stroke-width="1.5px"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                fill="none"></path>
                                                        </svg>
                                                    </a>
                                                    <input class="hidden" type="hidden" name="variantId"
                                                        value="79723856" />
                                                    <button class="btn-cart btn-views" title="Tùy chọn" type="button"
                                                        onclick="window.location.href='../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="16" viewBox="0 0 20 18" fill="none">
                                                            <path d="M1 3H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 15H4" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 3L19 3" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M12 15L19 15" stroke="#000" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path d="M1 9H2.5H3.25M13 9H7" stroke="#000"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <rect x="6" y="1" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="6" y="13" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                            <rect x="15" y="7" width="4" height="4"
                                                                rx="1.5" stroke="#000" stroke-width="1.5" />
                                                        </svg>
                                                    </button>
                                                    <a title="Xem nhanh"
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        data-handle="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung"
                                                        class="quick-view btn-views">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                                fill="black" />
                                                            <path
                                                                d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                                fill="black" />
                                                            <path
                                                                d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                                fill="black" />
                                                            <path
                                                                d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type">
                                                        Phụ kiện
                                                    </div>
                                                </div>

                                                <h3 class="product-name"><a
                                                        href="../vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                        title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                        nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a></h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        <span class="price">159.000₫</span>
                                                        <span class="compare-price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagenav">
                            <nav class="text-center nav_pagi">
                                <ul class="pagination clearfix">
                                    <li class="page-item disabled"><a class="page-link" href="#"
                                            title="«">«</a>
                                    </li>

                                    <li class="active page-item disabled"><a class="page-link" href="javascript:;"
                                            title="1">1</a></li>

                                    <li class="page-item"><a class="page-link" onclick="doSearch(2)"
                                            href="javascript:;" title="2">2</a></li>

                                    <li class="page-item"><a class="page-link" onclick="doSearch(3)"
                                            href="javascript:;" title="3">3</a></li>

                                    <li class="page-item"><a class="page-link" onclick="doSearch(2)"
                                            href="javascript:;" title="»">»</a></li>
                                </ul>
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
