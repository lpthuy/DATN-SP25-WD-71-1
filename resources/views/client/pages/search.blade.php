@extends('client.layouts.main')

@section('title', 'Kết quả tìm kiếm')

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
                    <form action="/search" method="get" class="input-group search-bar" role="search">
                        <input type="text" name="query" value="" autocomplete="off" placeholder="Tìm kiếm..." class="input-group-field auto-search " fdprocessedid="jxaqnb">
                        <button type="submit" class=" btn icon-fallback-text" fdprocessedid="9ynvd">
                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
