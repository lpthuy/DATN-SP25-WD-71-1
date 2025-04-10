@extends('client.layouts.main')

@section('title', 'Đổi mật khẩu')

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
                        <p>Xin chào, <span style="color:#f02757;">hoang van long</span>&nbsp;!</p>
                        <ul>
                            <li>
                                <a disabled="disabled" class="title-info" href="/account">Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a class="title-info" href="/account/orders">Đơn hàng của bạn</a>
                            </li>
                            <li>
                                <a class="title-info active" href="javascript:void(0);">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="title-info" href="/account/addresses">Sổ địa chỉ (0)</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Đổi mật khẩu</h1>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="page-login">
                                <form method="post" action="/account/changepassword" id="change_customer_password"
                                    accept-charset="UTF-8"><input name="FormType" type="hidden"
                                        value="change_customer_password"><input name="utf8" type="hidden"
                                        value="true">


                                    <p>Để đảm bảo tính bảo mật bạn vui lòng đặt lại mật khẩu với ít nhất 8 kí tự</p>


                                    <div class="form-signup clearfix">
                                        <fieldset class="form-group">
                                            <label for="oldPass">Mật khẩu cũ <span class="error">*</span></label>
                                            <input type="password" name="OldPassword" id="OldPass" required=""
                                                class="form-control form-control-lg" fdprocessedid="xh9cgt">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="changePass">Mật khẩu mới <span class="error">*</span></label>
                                            <input type="password" name="Password" id="changePass" required=""
                                                class="form-control form-control-lg" fdprocessedid="gzwgxo">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="confirmPass">Xác nhận lại mật khẩu <span
                                                    class="error">*</span></label>
                                            <input type="password" name="ConfirmPassword" id="confirmPass" required=""
                                                class="form-control form-control-lg" fdprocessedid="krpuop">
                                        </fieldset>
                                        <button class="button btn-edit-addr btn btn-primary btn-more" type="submit"
                                            onclick="window.location.reload()" fdprocessedid="kow33"><i
                                                class="hoverButton"></i>Đặt lại mật khẩu</button>
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
@endsection
