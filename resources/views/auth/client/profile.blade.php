@extends('client.layouts.main')

@section('title', 'Tài khoản')



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
                    <strong itemprop="name">Tài khoản</strong>
                    <meta itemprop="position" content="2" />
                </li>
            </ul>
        </div>
    </section>
    @section('title', 'Giỏ hàng')
@if(session('error'))
    <div class="alert alert-danger" style="margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif

    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>Xin chào, <span style="color:#ef4339;">{{ Auth::user()->name }}</span> &nbsp;!</p>
                        <ul>
                            <li>
                                <a disabled="disabled" class="title-info active" href="javascript:void(0);">Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('order') }}">Đơn hàng của bạn</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('changePassword') }}">Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Thông tin tài khoản</h1>
                    <div class="form-signup name-account m992">
                        <p><strong>Họ tên:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Số điện thoại:</strong> {{ Auth::user()->phone ?? 'Chưa cập nhật' }}</p>
                        <p><strong>Địa chỉ:</strong> {{ Auth::user()->address ?? 'Chưa cập nhật' }}</p>

                        <!-- Nút sửa thông tin -->
                        <a style="background: #ef4339;
          color: #fff;
          padding: 12px 20px;
          font-size: 16px;
          font-weight: bold;
          text-transform: uppercase;
          border-radius: 5px;
          border: 2px solid transparent;
          box-shadow: 0px 4px 10px rgba(239, 67, 57, 0.4);
          transition: all 0.3s ease-in-out;
          text-align: center;
          display: inline-block;
          cursor: pointer;"
   href="{{ route('editProfile') }}"
   onmouseover="this.style.background='#d62f29'; this.style.boxShadow='0px 6px 12px rgba(239, 67, 57, 0.6)'; this.style.transform='scale(1.05)';"
   onmouseout="this.style.background='#ef4339'; this.style.boxShadow='0px 4px 10px rgba(239, 67, 57, 0.4)'; this.style.transform='scale(1)';"
   class="btn">
   Sửa thông tin
</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
