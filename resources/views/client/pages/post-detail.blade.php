@extends('client.layouts.main')

@section('title', 'Tin tức')

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
                <a itemprop="item" href="{{ route('posts.index') }}" title="Tin tức">
                    <span itemprop="name">Tin tức</span>
                    <meta itemprop="position" content="2" />
                </a>
            </li>
    
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <strong>
                    <span itemprop="name">{{ $post->title }}</span>
                    <meta itemprop="position" content="3" />
                </strong>
            </li>
        </ul>
    </div>
    
</section>

    <div class="layout-blog" itemscope itemtype="https://schema.org/Blog">
        <meta itemprop="name" content="Tin tức">
        <meta itemprop="description"
            content="LOFI STYLE - Thương hiệu thời trang của người trẻ hiện đại! Ra đời vào năm 2016, LOFISTYLE luôn nỗ lực với sứ mệnh tạo nên xu hướng thời trang mang đến sự tin tin và năng lượng tích cực cho khách hàng.">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-content">
                        <h1 class="title-page">Tin tức</h1>
                        <div class="list-blogs row">
                            <div class="post-detail">
                                <h1>{{ $post->title }}</h1>
                                <div class="post-meta">
                                    <span>By {{ $post->author }}</span> | 
                                    <span>{{ $post->created_at->format('l, d/m/Y') }}</span>
                                </div>
                                <div class="post-content">
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-12">
                    <div class="sidebar">
                        <div class="group-menu">
                            <div class="sidebarblog-title title_block">
                                <h2>Danh mục trang</h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('about') }}" title="Giới thiệu">Giới
                                            thiệu</a>
                                    </li>
                                
                                    <li class="has-submenu level0">
                                        <a class="nav-link" href="{{ route('allProducts') }}" title="Sản phẩm">
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
                                    
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('post') }}" title="Tin tức">Tin tức</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('contact') }}" title="Liên hệ">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="group-menu">
                            <div class="news-latest">



                                <div class="sidebarblog-title title_block">
                                    <h2><a href="tin-tuc.html">Tin tức mới nhất</a></h2>
                                </div>
                                
                                <div class="list-news-latest">
                                    <div class="news-container">
                                        @foreach($posts as $post)
                                            @if($post->is_active) 
                                                <div class="news-item">
                                                    <a class="news-image" href="{{ route('showpost', $post) }}" title="{{ $post->title }}">
                                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                                    </a>
                                                    <h3 class="news-title">
                                                        <a href="{{ route('showpost', $post) }}">{{ $post->title }}</a>
                                                    </h3>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                
                                <style>
                                    .news-container {
                                        max-height: 350px; /* Giới hạn chiều cao */
                                        overflow-y: auto; /* Tạo thanh cuộn dọc */
                                        padding-right: 10px;
                                    }
                                
                                    .news-item {
                                        display: flex;
                                        align-items: center;
                                        gap: 15px;
                                        border-bottom: 1px solid #ddd;
                                        padding-bottom: 10px;
                                        padding-top: 10px;
                                    }
                                
                                    .news-image img {
                                        width: 80px; 
                                        height: 80px;
                                        object-fit: cover;
                                        border-radius: 8px;
                                    }
                                
                                    .news-title {
                                        font-size: 16px;
                                        font-weight: bold;
                                        margin: 0;
                                    }
                                
                                    .news-title a {
                                        color: #333;
                                        text-decoration: none;
                                    }
                                
                                    .news-title a:hover {
                                        color: #d9534f;
                                    }
                                
                                    /* Ẩn scrollbar để giao diện đẹp hơn */
                                    .news-container::-webkit-scrollbar {
                                        width: 5px;
                                    }
                                
                                    .news-container::-webkit-scrollbar-thumb {
                                        background: #888;
                                        border-radius: 5px;
                                    }
                                </style>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
