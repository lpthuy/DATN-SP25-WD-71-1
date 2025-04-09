@extends('client.layouts.main')

@section('title', 'Giới thiệu')

@section('content')
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="index.html" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                        <meta itemprop="position" content="1" />
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <strong itemprop="name">Giới thiệu</strong>
                    <meta itemprop="position" content="2" />
                </li>

            </ul>
        </div>
    </section>
    <section class="pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 order-lg-9">
                    <div class="page-wrapper">
                        <h1 class="title-page">Giới thiệu</h1>
                        <div class="content-page rte">


                            <p><b>LOFI STYLE&nbsp;</b>- Thương hiệu thời trang của người trẻ hiện đại! Ra đời
                                vào năm 2016, LOFISTYLE&nbsp;luôn nỗ lực với sứ mệnh tạo nên xu hướng thời trang
                                mang đến sự tin tưởng&nbsp;và năng lượng tích cực cho khách hàng.&nbsp;<b>LOFI
                                    STYLE&nbsp;</b>mang hơi thở của thời trang&nbsp;<strong><em>HIỆN ĐẠI, TRẺ
                                        TRUNG, PHÓNG KHOÁNG</em></strong>&nbsp;với những mẫu thiết kế bắt nhịp
                                xu hướng thịnh hành và có tính ứng dụng cao trong mọi hoàn cảnh.</p>
                            <p>&nbsp;</p>
                            <p><em><strong>HÃY ĐẾN&nbsp;</strong><b>LOFI STYLE</b><strong>&nbsp;ĐỂ TRẢI NGHIỆM
                                        SỰ KHÁC BIỆT!</strong></em></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 order-lg-3">
                    <div class="sidebar">
                        <div class="group-menu">
                            <div class="page_menu_title title_block">
                                <h2>Danh mục trang</h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('about') }}" title="Giới thiệu">Giới
                                            thiệu</a>
                                    </li>
                                   
                                    <li class="has-submenu level0">
                                        <a class="nav-link" href="{{ route('products.all') }}" title="Sản phẩm">
                                            Sản phẩm
                                            <span class="icon-plus-submenu plus-nClick1"></span> <!-- Nút "+" -->
                                        </a>
                                        <ul class="submenu-links" style="display: none;">
                                            @foreach ($categories as $category)
                                                <li class="has-submenu level1">
                                                    <a href="{{ route('productbycategory', ['id' => $category->id]) }}" title="{{ $category->name }}">
                                                        {{ $category->name }}
                                                       
                                                    </a>
                                                    <ul class="submenu-links" style="display: none;">
                                                        @foreach ($category->subcategories ?? [] as $subcategory)
                                                            <li><a href="{{ route('productbycategory', ['id' => $subcategory->id]) }}">{{ $subcategory->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
                                    
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('post') }}" title="Tin tức">Tin tức</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('contact') }}" title="Liên hệ">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
