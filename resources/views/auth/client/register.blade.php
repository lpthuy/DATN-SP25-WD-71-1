@extends('client.layouts.main')

@section('title', 'Đăng ký')

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
                    <strong itemprop="name">Đăng ký</strong>
                    <meta itemprop="position" content="2" />
                </li>

            </ul>
        </div>
    </section>
    <section class="section">
        <div class="container ">
            <div class="wrap_background_aside  page_login">
                <div class="wrap_background_aside">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xl-4 offset-xl-4 offset-lg-3 offset-md-3 offset-xl-3">
                            <div class="row">
                                <div class="page-login pagecustome clearfix">
                                    <div class="wpx">
                                        <h1 class="title_heads a-center"><span>Đăng ký</span></h1>
                                <span class="block a-center dkm margin-top-10">Đã có tài khoản? <a href="{{ route('login') }}" class="btn-link-style btn-register">Đăng nhập tại đây</a></span>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form method="POST" action="{{ route('doRegister') }}">
                                    @csrf
                                    <div class="form-signup">
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Họ và Tên" required value="{{ old('name') }}">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required value="{{ old('email') }}">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control form-control-lg" name="phone" placeholder="Số điện thoại" required value="{{ old('phone') }}">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Mật khẩu" required>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                                        </fieldset>
                                        <div class="section">
                                            <button type="submit" class="btn btn-style btn_50">Đăng ký</button>
                                        </div>
                                    </div>
                                </form>
                                            <div class="block social-login--facebooks margin-top-15">
                                                <p class="a-center">
                                                    Hoặc đăng nhập bằng
                                                </p>
                                                <script>function loginFacebook(){var a={client_id:"947410958642584",redirect_uri:"https://store.mysapo.net/account/facebook_account_callback",state:JSON.stringify({redirect_url:window.location.href}),scope:"email",response_type:"code"},b="https://www.facebook.com/v3.2/dialog/oauth"+encodeURIParams(a,!0);window.location.href=b}function loginGoogle(){var a={client_id:"997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",redirect_uri:"https://store.mysapo.net/account/google_account_callback",scope:"email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",access_type:"online",state:JSON.stringify({redirect_url:window.location.href}),response_type:"code"},b="https://accounts.google.com/o/oauth2/v2/auth"+encodeURIParams(a,!0);window.location.href=b}function encodeURIParams(a,b){var c=[];for(var d in a)if(a.hasOwnProperty(d)){var e=a[d];null!=e&&c.push(encodeURIComponent(d)+"="+encodeURIComponent(e))}return 0==c.length?"":(b?"?":"")+c.join("&")}</script>
                                                <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                                                <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection










