@extends('client.layouts.main')

@section('title', 'Đổi mật khẩu')

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
                <strong itemprop="name">Đổi mật khẩu</strong>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</section>

<section class="signup page_customer_account">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                <div class="block-account">
                    <h5 class="title-account">Trang tài khoản</h5>
                    <p>Xin chào, <span style="color:#f02757;">{{ Auth::user()->name }}</span> !</p>
                    <ul>
                        <li>
                            <a class="title-info" href="{{ route('profile') }}">Thông tin tài khoản</a>
                        </li>
                        <li>
                            <a class="title-info active" href="{{ route('change.password') }}">Đổi mật khẩu</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                <h1 class="title-head margin-top-0">Đổi mật khẩu</h1>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="page-login">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('do.change.password') }}" id="change_customer_password">
                                @csrf <!-- Thêm CSRF token để bảo mật -->
                                <p>Để đảm bảo tính bảo mật bạn vui lòng đặt lại mật khẩu với ít nhất 8 kí tự</p>

                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <label for="oldPass">Mật khẩu cũ <span class="error">*</span></label>
                                        <input type="password" name="old_password" id="oldPass" required=""
                                            class="form-control form-control-lg" fdprocessedid="xh9cgt">
                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="changePass">Mật khẩu mới <span class="error">*</span></label>
                                        <input type="password" name="new_password" id="changePass" required=""
                                            class="form-control form-control-lg" fdprocessedid="gzwgxo">
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="confirmPass">Xác nhận lại mật khẩu <span class="error">*</span></label>
                                        <input type="password" name="new_password_confirmation" id="confirmPass" required=""
                                            class="form-control form-control-lg" fdprocessedid="krpuop">
                                        @error('new_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <button class="button btn-edit-addr btn btn-primary btn-more" type="submit"
                                        fdprocessedid="kow33">Đặt lại mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    // Có thể thêm JavaScript để xử lý form nếu cần
</script>
@endsection