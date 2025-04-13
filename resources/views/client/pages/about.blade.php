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

                            <p><strong>🌈 RAINBOW SHOP – Phong cách thời trang của thế hệ trẻ hiện đại!</strong></p>
                        
                            <p>Được thành lập từ năm 2025, Rainbow Shop không chỉ là một cửa hàng thời trang – chúng mình là nơi lan tỏa cảm hứng sống tích cực, cá tính và thời thượng đến từng bạn trẻ Việt Nam. Với thông điệp <em><strong>“Sắc màu riêng, chất riêng”</strong></em>, Rainbow Shop luôn nỗ lực mỗi ngày để mang đến những bộ sưu tập mới mẻ, hiện đại và gần gũi, giúp bạn tự tin thể hiện bản thân ở bất cứ đâu.</p>
                        
                            <p>Từ phong cách basic hiện đại, năng động đường phố, đến những thiết kế trẻ trung, phá cách, mỗi sản phẩm tại Rainbow đều mang đậm cá tính, bắt kịp xu hướng và cực kỳ dễ mix-match trong cuộc sống hằng ngày – đi học, đi chơi hay hẹn hò đều ổn áp!</p>
                        
                            <p><strong>💖 Chúng mình không chỉ bán thời trang, mà còn gửi gắm vào đó sự chỉn chu, tận tâm và yêu thương.</strong> Hãy để Rainbow Shop đồng hành cùng bạn trên hành trình tìm kiếm phiên bản rực rỡ nhất của chính mình trong năm 2025 nhé!</p>
                        
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
