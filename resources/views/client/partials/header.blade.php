<header id="header">

    <head>
        <!-- Thêm CSRF Token vào đây -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <body data-user-authenticated="{{ Auth::check() ? 'true' : 'false' }}"
        data-user-role="{{ Auth::check() ? Auth::user()->role : '' }}">

        </head>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-6 contact-header">
                        {{-- <span>
                            Hotline:
                            <a class="fone" href="tel:19006750" title="1900 6750">1900 6750</a>
                        </span>
                        <span class="d-md-inline-block d-none">
                            Email:
                            <a href="mailto:support@sapo.vn" title="support@sapo.vn">support@sapo.vn</a>
                        </span> --}}
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="account-header">
                            @if(Auth::check())
                            <div class="dropdown user-dropdown">
                                <button class="avatar-btn" type="button">
                                    <img src="{{ Auth::user()->avatar ?? asset('client/images/rainbow.png') }}"
                                        class="user-avatar" alt="Avatar">
                                    <span>{{ Auth::user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Trang cá nhân</a></li>
                                    @if(Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quay lại trang
                                            Admin</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="{{ route('order.index') }}">Đơn hàng của tôi</a>
                                    </li>
                                    @endif
                                    <li>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                                        </form>

                                    </li>
                                </ul>
                            </div>
                            @else
                            <a class="btnx" href="{{ route('login') }}" title="Đăng nhập">Đăng nhập</a>
                            <a href="{{ route('register') }}" title="Đăng ký">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header">
            <div class="container">
                <div class="box-hearder">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2 col-2 header-upper-menu-mobile">
                            <div class="header-action-toggle" id="site-menu-handle">
                                <img width="64" height="64" src="{{ asset('client/images/rainbow') }}" alt="Lofi Style">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-8 col-6 header-logo">


                            <a href="{{ route('home') }}" class="logo" title="Logo">
                                <img src="{{ asset('client/images/rainbow.png') }}" alt="rainbow" class="logo-img">
                            </a>


                            <style>
                                .logo-img {
                                    height: 70px;
                                    width: auto;
                                    max-width: 70%;
                                    object-fit: contain;
                                }

                                /* Đảm bảo nền ban đầu là trong suốt */
                                .dropdown-item {
                                    color: black;
                                    /* Màu chữ mặc định */
                                    background-color: transparent;
                                    /* Nền trong suốt */
                                    transition: background-color 0.3s ease;
                                    /* Hiệu ứng mượt */
                                }

                                /* Khi hover vào item, chỉ đổi nền */
                                .dropdown-item:hover {
                                    background-color: #e50a1c !important;
                                    /* Nền đỏ nhạt khi hover */
                                    color: black;
                                    /* Giữ màu chữ đen */
                                }
                            </style>

                        </div>
                        <div class="col-lg-8 header-mid">
                            <div class="header-menu-des">
                                <div class="close-menu d-lg-none d-block">
                                    <img width="25" height="25" src="{{ asset('client/images/close4d9c.png') }}" alt="Lofi Style">
                                </div>
                                <div id="main-nav-menu">
                                    <ul class="menuList-main">
                                        <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
                                        </li>
                                        <li class="nav-item has-submenu
                                            {{ in_array(Route::currentRouteName(), ['products.all', 'productbycategory']) ? 'active' : '' }}">
                                            <a class="nav-link caret-down" href="{{ route('products.all') }}" title="Sản phẩm">Sản phẩm</a>
                                            <i class="fa ic-caret-down"></i>
                                            <ul class="menuList-submain level-1">
                                                @foreach ($categories as $category)
                                                <li>
                                                    <a class="{{ request()->routeIs('productbycategory') && request()->route('id') == $category->id ? 'active' : '' }}"
                                                        href="{{ route('productbycategory', ['id' => $category->id]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li class="nav-item {{ Route::currentRouteName() == 'post' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('post') }}" title="Tin tức">Tin tức</a>
                                        </li>
                                        <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('about') }}" title="Giới thiệu">Giới thiệu</a>
                                        </li>
                                        <li class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('contact') }}" title="Liên hệ">Liên hệ</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flash-scroll">
                                    {{-- <a href="javascript:;" data-href=".section_flash_sale" class="scroll-down">
                                        <img width="12" src="{{ asset('client/images/menu_icon_34d9c.png') }}" alt="Lofi Style">
                                    </a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-4 header-right">
                            <div class="header-wrap-icon">

                                <div class="wrap-search header-action">
                                    <div class="header-action-toggle" id="search-handle">
                                        <span class="box-icon">
                                            <img width="24" height="24"
                                                src="{{ asset('client/images/search4d9c.png') }}" alt="Lofi Style">
                                        </span>
                                    </div>
                                    <div class="header_dropdown site_search">
                                        <div class="site-search-container">
                                            <p class="title">Tìm kiếm</p>
                                            <div class="wrapper-search">
                                                <form action="{{ route(name: 'search') }}" method="get" role="search"
                                                    class="searchform searchform-categoris ultimate-search">
                                                    <div class="search-inner">
                                                        <input id="inputSearch" type="text" name="query" value
                                                            class="input-search form-control"
                                                            placeholder="Tìm kiếm sản phẩm..." autocomplete="off" />
                                                        <input type="hidden" name="type" value="product" />
                                                    </div>
                                                    <button type="submit" aria-label="Tìm kiếm" class="btn-search"
                                                        id="search-btn">
                                                        <img width="24" height="27"
                                                            src="{{ asset('client/images/search4d9c.png') }}"
                                                            alt="Lofi Style">
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="wrap-cart header-action block-cart">
                                    <a href="{{ route('cart.show') }}" class="header-action-toggle header-cart"
                                        id="site-cart-handle">
                                        <span class="box-icon">
                                            <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns="http://www.w3.org/2000/svg" class="svg-icon " width="24"
                                                height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M7 8V6C7 4.67392 7.52678 3.40215 8.46447 2.46447C9.40215 1.52678 10.6739 1 12 1C13.3261 1 14.5979 1.52678 15.5355 2.46447C16.4732 3.40215 17 4.67392 17 6V8H20C20.2652 8 20.5196 8.10536 20.7071 8.29289C20.8946 8.48043 21 8.73478 21 9V21C21 21.2652 20.8946 21.5196 20.7071 21.7071C20.5196 21.8946 20.2652 22 20 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V9C3 8.73478 3.10536 8.48043 3.29289 8.29289C3.48043 8.10536 3.73478 8 4 8H7ZM7 10H5V20H19V10H17V12H15V10H9V12H7V10ZM9 8H15V6C15 5.20435 14.6839 4.44129 14.1213 3.87868C13.5587 3.31607 12.7956 3 12 3C11.2044 3 10.4413 3.31607 9.87868 3.87868C9.31607 4.44129 9 5.20435 9 6V8Z"
                                                    fill="#121212" />
                                            </svg>
                                            <span
                                                class="count_item_pr count">{{ session('cart') ? count(session('cart')) : 0 }}</span>

                                        </span>
                                    </a>
                                    <div class="top-cart-content">
                                        <div class="CartHeaderContainer">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-bar-mobile">
            <div class="container">
                <div class="search-box">
                    <form class="searchform" action="https://lofi-style.mysapo.net/search" method="get" role="search">
                        <div class="search-inner">
                            <input type="hidden" name="type" value="product" />
                            <input required id="inputSearch" name="query" autocomplete="off" class="input-search"
                                type="text" placeholder="Tìm kiếm sản phẩm...">
                        </div>
                        <button type="submit" class="btn-search" id="search-btn">
                            <img width="24" height="27" src="{{ asset('client/images/search4d9c.png') }}"
                                alt="Lofi Style">
                        </button>
                    </form>
                </div>
            </div>
        </div>
</header>

<script>
    function updateCartCount() {
        fetch("{{ route('cart.count') }}")
            .then(response => response.json())
            .then(data => {
                document.querySelector('.count_item_pr.count').innerText = data.cart_count;
            })
            .catch(error => console.error('Lỗi cập nhật giỏ hàng:', error));
    }

    // Cập nhật ngay khi thêm vào giỏ hàng
    document.querySelectorAll('.btn-cart').forEach(button => {
        button.addEventListener('click', function() {
            setTimeout(updateCartCount, 1000);
        });
    });

    // Cập nhật khi tải trang
    document.addEventListener("DOMContentLoaded", updateCartCount);

    // ✅ Tự động kiểm tra mỗi 5 giây nếu có sản phẩm bị ẩn
    setInterval(() => {
        fetch("{{ route('cart.recheck') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // ✅ Cập nhật số lượng hiển thị ở giỏ hàng header
                    document.querySelector('.count_item_pr.count').innerText = Object.keys(data.cart).length;
                }
            });
    }, 5000); // mỗi 5 giây
</script>