@extends('client.layouts.main')

@section('title', 'Liên hệ')

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
                    <strong itemprop="name">Liên hệ</strong>
                    <meta itemprop="position" content="2" />
                </li>

            </ul>
        </div>
    </section>
    <h1 class="title-head-contact a-left d-none">Liên hệ</h1>
    <div class="layout-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="contact">
                        <h3>Công ty TNHH thời trang Lofi Style</h3>
                        <div class="des_foo">Với sứ mệnh "Khách hàng là ưu tiên số 1" chúng tôi luôn mạng lại
                            giá trị tốt nhất</div>
                        <div class="time_work">
                            <div class="item">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                    class="svg-inline--fa fa-map-marker-alt fa-w-12">
                                    <path fill="currentColor"
                                        d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"
                                        class=""></path>
                                </svg>
                                <b>Địa chỉ:</b>

                                266 Đội Cấn, Quận Ba Đình, Hà Nội

                            </div>
                            <div class="item">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="svg-inline--fa fa-envelope fa-w-16">
                                    <path fill="currentColor"
                                        d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"
                                        class=""></path>
                                </svg>
                                <b>Email:</b> <a href="mailto:support@sapo.vn">support@sapo.vn</a>
                            </div>
                            <div class="item">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="svg-inline--fa fa-phone-alt fa-w-16">
                                    <path fill="currentColor"
                                        d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"
                                        class=""></path>
                                </svg>
                                <b>Hotline:</b> <a class="fone" href="tel:19006750">1900 6750</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-contact">
                        <h4>
                            Liên hệ với chúng tôi
                        </h4>
                        <div id="pagelogin">
                            <form method="post" action="https://lofi-style.mysapo.net/postcontact" id="contact"
                                accept-charset="UTF-8"><input name="FormType" type="hidden" value="contact" /><input
                                    name="utf8" type="hidden" value="true" /><input type="hidden"
                                    id="Token-f653ec83ad014cdebf7c866065524e2c" name="Token" />
                                <script src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                                <script>
                                    grecaptcha.ready(function() {
                                        grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                            action: "contact"
                                        }).then(function(token) {
                                            document.getElementById("Token-f653ec83ad014cdebf7c866065524e2c").value = token
                                        });
                                    });
                                </script>


                                <div class="group_contact">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <input placeholder="Họ và tên" type="text"
                                                class="form-control  form-control-lg" required value=""
                                                name="contact[Name]">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <input placeholder="Email" type="email"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required id="email1"
                                                class="form-control form-control-lg" value="" name="contact[email]">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <input type="number" placeholder="Điện thoại*" name="contact[phone]"
                                                class="form-control form-control-lg" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <textarea placeholder="Nội dung" name="contact[body]" id="comment"
                                                class="form-control content-area form-control-lg" rows="5" Required></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="submit" class="btn-lienhe">Gửi thông tin</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div id="contact_map" class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.904611732553!2d105.81388241542348!3d21.03650239288885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab1946cc7e23%3A0x87ab3917166a0cd5!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8O0bmcgbmdo4buHIFNBUE8!5e0!3m2!1svi!2s!4v1555900531747!5m2!1svi!2s"
                            style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
