@extends('client.layouts.main')

@section('title', 'Yêu thích')

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
                    <strong itemprop="name">Yêu thích</strong>
                    <meta itemprop="position" content="2" />
                </li>

            </ul>
        </div>
    </section>
    <section class="pages">
        <div class="container">
            <div class="page-wrapper">
                <h1 class="title-page">Danh sách yêu thích của tôi</h1>
                <div class="content-page rte">
                    <div id="sidebar-all">
                        <div class="sidebar-all-wrap-right" data-type="wishlist">
                            <div class="sidebar-all-wrap-right-main">
                                <div class="sidebar-all-wrap-right-main-list page-wishlist row">

                                <div class="sidebar-all-wrap-right-main-top-error col-12"><span>Bạn chưa có sản phẩm yêu thích, <a href="/collections/all" style="color: #007bff;">vào đây</a> để thêm thật nhiều sản phẩm vào yêu thích nào. </span></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
