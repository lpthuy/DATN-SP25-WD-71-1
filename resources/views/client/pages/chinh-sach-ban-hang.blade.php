@extends('client.layouts.main')

@section('title', 'Chính sách bán hàng')

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
                    <strong itemprop="name">Chính sách bán hàng</strong>
                    <meta itemprop="position" content="2" />
                </li>
            </ul>
        </div>
    </section>

    <section class="pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 order-lg-9">
                    <div class="page-wrapper">
                        <h1 class="title-page">Chính sách bán hàng</h1>
                        <div class="content-page rte">

                            <p>RAINBOW STORE cam kết mang đến trải nghiệm mua sắm an toàn, minh bạch và tiện lợi cho tất cả khách hàng.</p>

                            <p><br>1. <strong>Hình thức bán hàng</strong>:</p>
                            <ul>
                                <li>Bán hàng trực tuyến qua website, fanpage và hotline.</li>
                                <li>Không áp dụng chính sách bán hàng tại cửa hàng trực tiếp.</li>
                                <li>Mọi sản phẩm đều được mô tả chi tiết về hình ảnh, chất liệu, kích thước, giá cả.</li>
                            </ul>

                            <p><br>2. <strong>Giá bán & khuyến mãi</strong>:</p>
                            <ul>
                                <li>Giá bán được niêm yết rõ ràng, công khai trên website.</li>
                                <li>Chương trình khuyến mãi được áp dụng đúng thời gian quy định, không cộng dồn nhiều ưu đãi trừ khi có ghi chú khác.</li>
                            </ul>

                            <p><br>3. <strong>Đặt hàng & thanh toán</strong>:</p>
                            <ul>
                                <li>Khách hàng có thể đặt hàng qua website, inbox fanpage hoặc gọi điện hotline.</li>
                                <li>Thanh toán chuyển khoản trước hoặc thanh toán khi nhận hàng (COD).</li>
                                <li>Đơn hàng chỉ được xử lý sau khi khách hàng xác nhận đầy đủ thông tin.</li>
                            </ul>

                            <p><br>4. <strong>Chăm sóc sau bán</strong>:</p>
                            <ul>
                                <li>Hỗ trợ đổi/trả hàng theo <a href="/chinh-sach-doi-tra" title="Chính sách đổi trả">chính sách đổi trả</a> trong vòng 3 ngày.</li>
                                <li>Hỗ trợ kiểm tra đơn hàng, tư vấn và giải đáp thắc mắc sau khi mua.</li>
                                <li>Mọi thắc mắc xin liên hệ fanpage hoặc hotline để được xử lý nhanh chóng.</li>
                            </ul>

                            <p><br>RAINBOW STORE luôn đặt sự hài lòng của khách hàng lên hàng đầu. Chúng tôi trân trọng mọi phản hồi để nâng cao chất lượng dịch vụ.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 order-lg-3">
                    <div class="sidebar">
                        <div class="group-menu">
                            <div class="page_menu_title title_block">
                                <h2>Danh mục trang</h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/gioi-thieu" title="Giới thiệu">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/tin-tuc" title="Tin tức">Tin tức</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/lien-he" title="Liên hệ">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>			
                </div>
            </div>
        </div>
    </section>
@endsection
