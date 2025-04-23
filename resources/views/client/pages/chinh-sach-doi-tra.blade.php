@extends('client.layouts.main')

@section('title', 'Chính sách đổi trả')

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
                    <strong itemprop="name">Chính sách đổi trả</strong>
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
                        <h1 class="title-page">Chính sách đổi trả</h1>
                        <div class="content-page rte">

                            <p>RAINBOW STORE cam kết bảo vệ quyền lợi khách hàng với chính sách đổi trả minh bạch và rõ ràng.</p>

                            <p><br>1. <strong>Điều kiện đổi trả</strong>:</p>
                            <ul>
                                <li>Thời gian yêu cầu đổi/trả trong vòng 3 ngày kể từ ngày nhận hàng.</li>
                                <li>Sản phẩm còn nguyên tem mác, chưa qua sử dụng, không bị bẩn, hỏng, hoặc can thiệp từ bên ngoài.</li>
                                <li>Phải có hóa đơn mua hàng hoặc biên lai vận chuyển kèm theo để đối chiếu.</li>
                            </ul>
                            <p>*Không áp dụng đổi trả với các sản phẩm giảm giá, khuyến mãi đặc biệt hoặc thanh lý.</p>

                            <p><br>2. <strong>Lý do hỗ trợ đổi trả</strong>:</p>
                            <ul>
                                <li>Giao nhầm sản phẩm, sai mẫu, sai size.</li>
                                <li>Sản phẩm bị lỗi từ nhà sản xuất (rách, lỗi chất liệu, hỏng khóa...).</li>
                                <li>Hư hại trong quá trình vận chuyển.</li>
                            </ul>

                            <p><br>3. <strong>Quy trình đổi trả</strong>:</p>
                            <ol>
                                <li>Liên hệ fanpage hoặc hotline để thông báo trong vòng 3 ngày.</li>
                                <li>Cung cấp thông tin: tên, số điện thoại đặt hàng, hình ảnh sản phẩm và lý do đổi trả.</li>
                                <li>RAINBOW STORE xác nhận và hướng dẫn gửi sản phẩm về.</li>
                                <li>Sau khi kiểm tra, sản phẩm sẽ được đổi hoặc hoàn tiền theo yêu cầu.</li>
                            </ol>
                            <p>Thời gian xử lý đổi trả từ 3 – 5 ngày làm việc.</p>

                            <p><br>4. <strong>Chi phí đổi trả</strong>:</p>
                            <ul>
                                <li>Miễn phí nếu lỗi thuộc về RAINBOW STORE hoặc đơn vị vận chuyển.</li>
                                <li>Khách hàng chịu chi phí nếu đổi/trả vì lý do cá nhân (đổi mẫu, đổi size,...).</li>
                            </ul>

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
