@extends('client.layouts.main')

@section('title', 'Chỉnh sửa thông tin')

@section('content')
<section class="bread-crumb">
    <div class="container">
        <ul class="breadcrumb">
            <li class="home"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><strong>Chỉnh sửa thông tin</strong></li>
        </ul>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="wrap_background_aside page_login">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4 offset-xl-4">
                    <div class="page-login clearfix">
                        <h1 class="title_heads a-center"><span>Chỉnh sửa thông tin</span></h1>
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('updateProfile') }}">
                            @csrf
                            <div class="form-signup">
                                <fieldset class="form-group">
                                    <label for="name">Họ và Tên:</label>
                                    <input type="text" class="form-control form-control-lg" name="name"
                                        value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control form-control-lg" name="email"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="text" class="form-control form-control-lg" name="phone"
                                        value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="address">Địa chỉ:</label>
                                    <input type="text" class="form-control form-control-lg" name="address"
                                        value="{{ old('address', $user->address) }}" required>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <button type="submit" class="btn btn-style btn_50">Lưu thay đổi</button>

                                <a style="background: #6c757d;
                                          color: #fff;
                                          padding: 12px 20px;
                                          font-size: 16px;
                                          font-weight: bold;
                                          text-transform: uppercase;
                                          border-radius: 5px;
                                          border: 2px solid transparent;
                                          box-shadow: 0px 4px 10px rgba(108, 117, 125, 0.4);
                                          transition: all 0.3s ease-in-out;
                                          text-align: center;
                                          display: inline-block;
                                          cursor: pointer;
                                          margin-top: 10px;"
                                    href="{{ route('profile') }}"
                                    onmouseover="this.style.background='#5a6268'; this.style.boxShadow='0px 6px 12px rgba(108, 117, 125, 0.6)'; this.style.transform='scale(1.05)';"
                                    onmouseout="this.style.background='#6c757d'; this.style.boxShadow='0px 4px 10px rgba(108, 117, 125, 0.4)'; this.style.transform='scale(1)';"
                                    class="btn btn-secondary">
                                    Hủy
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection