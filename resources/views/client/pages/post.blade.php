@extends('client.layouts.main')

@section('title', 'Tin tức')

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
                    <strong itemprop="name">Tin tức</strong>
                    <meta itemprop="position" content="2" />
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
                  
                            @foreach($posts as $post)
                            @if($post->is_active) <!-- Kiểm tra trạng thái bài viết -->
                                <article class="list-article col-xl-6 col-lg-6 col-md-6 col-12">
                                    <div class="blog-post">
                                        <div class="post-image">
                                            <a class="post-thumbnail" href="{{ route('showpost', $post->id) }}" title="{{ $post->title }}">
                                                <!-- Hiển thị ảnh bìa nếu có -->
                                                @if($post->image)
                                                    <img class="lazy" src="{{ asset('storage/'.$post->image) }}" data-src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                                                @else
                                                    <img class="lazy" src="{{ asset('storage/default_image.jpg') }}" data-src="{{ asset('storage/default_image.jpg') }}" alt="Default image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <div class="blog-post-meta">
                                                <div class="time-post f">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user"
                                                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user fa-w-14">
                                                        <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" class=""></path>
                                                    </svg>
                                                    <span>{{ $post->author }}</span>
                                                </div>
                                                <div class="time-post">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-clock fa-w-16">
                                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216zm-148.9 88.3l-81.2-59c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h14c6.6 0 12 5.4 12 12v146.3l70.5 51.3c5.4 3.9 6.5 11.4 2.6 16.8l-8.2 11.3c-3.9 5.3-11.4 6.5-16.8 2.6z" class=""></path>
                                                    </svg>
                                                    {{ $post->created_at->format('l, d/m/Y') }}
                                                </div>
                                            </div>
                                            <h3 class="blog-post-title">
                                                <a href="{{ route('showpost', $post->id) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                                            </h3>
                        
                                            <div class="entry-content">
                                                {{ Str::limit($post->content, 100) }}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                        
                        
                        <style>
                            /* Chia 2 bài viết trên mỗi dòng */
.list-article {
    width: 48%;
    display: inline-block;
    vertical-align: top;
    margin-bottom: 20px;
}

/* Ẩn nội dung bài viết */
.entry-content {
    display: none;
}

/* Đồng nhất kích thước ảnh */
.post-image img {
    width: 100%;
    height: 180px; /* Chiều cao cố định */
    object-fit: cover; /* Cắt ảnh phù hợp khung */
    border-radius: 8px;
}

/* Căn giữa chữ */
.blog-post-title {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
}

/* Khoảng cách giữa các bài viết */
.blog-post {
    padding: 10px;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
}

                        </style>

                        
                        <div class="pagination-wrapper text-center mt-4">
                            {{ $posts->links() }} <!-- Tạo các liên kết phân trang -->
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
