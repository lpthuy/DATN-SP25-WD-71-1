@extends('client.layouts.main')

@section('title', 'Trang chủ')

@section('content')
<!-- Swiper CSS -->


<h1 class="d-none"> RAINBOW - STORE Thương hiệu thời trang của người trẻ hiện đại! Ra đời vào năm
    2016, RAINBOW - STORE luôn nỗ lực với sứ mệnh tạo nên xu hướng thời trang mang đến sự tin tin và năng lượng
    tích cực cho khách hàng.</h1>

<section class="awe-section-1">
    <div class="section_slider">
        <div class="home-slider swiper-container">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                <div class="swiper-slide">
                    <a href="{{ $banner->link ?? '#' }}" class="clearfix" title="{{ $banner->title }}">
                        <picture>
                            <source media="(min-width: 1200px)" srcset="{{ asset('storage/' . $banner->image) }}">
                            <source media="(min-width: 992px)" srcset="{{ asset('storage/' . $banner->image) }}">
                            <source media="(min-width: 569px)" srcset="{{ asset('storage/' . $banner->image) }}">
                            <source media="(max-width: 567px)" srcset="{{ asset('storage/' . $banner->image) }}">
                            <img width="1903" height="694"
                                src="{{ asset('storage/' . $banner->image) }}"
                                alt="{{ $banner->title }}"
                                class="img-responsive lazy" />
                        </picture>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>


    <section class="awe-section-2">
        <section class="section_service">
            <div class="container">
                <div class="block-content">
                    <div class="service-swiper swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="32" viewBox="0 0 41 32"
                                        fill="none">
                                        <path
                                            d="M36.0389 0.00115465H29.1444C29.1422 0.00115465 29.1411 0 29.1389 0H21.9378C21.9356 0 21.9344 0.00115465 21.9322 0.00115465H6.22778C5.46445 0.00115465 4.84556 0.644295 4.84556 1.43754C4.84556 2.23079 5.46445 2.87393 6.22778 2.87393H20.5556V11.52C20.5556 12.3097 21.1778 12.9563 21.9378 12.9563H29.1389C29.8989 12.9563 30.5211 12.3097 30.5211 11.52V2.87393H36.0389C36.9744 2.87393 37.7356 3.66486 37.7356 4.63823V27.3641C37.7356 28.3363 36.9744 29.1272 36.0389 29.1272H14.17C13.2344 29.1272 12.4733 28.3363 12.4733 27.3641V11.5754C12.4733 10.7821 11.8544 10.139 11.0911 10.139H7.43667C6.67333 10.139 6.05444 10.7821 6.05444 11.5754C6.05444 12.3686 6.67333 13.0118 7.43667 13.0118H9.70889V27.3641C9.70889 29.9205 11.71 32 14.17 32H36.0389C38.4989 32 40.5 29.9193 40.5 27.3641V4.63708C40.5 2.08184 38.4989 0.00115465 36.0389 0.00115465ZM27.7567 10.0824H23.32V2.87393H27.7567V10.0824Z"
                                            fill="black" />
                                        <path
                                            d="M1.88222 7.94054H10.41C11.1733 7.94054 11.7922 7.29739 11.7922 6.50415C11.7922 5.7109 11.1733 5.06776 10.41 5.06776H1.88222C1.11889 5.06776 0.5 5.71206 0.5 6.50415C0.5 7.29624 1.11889 7.94054 1.88222 7.94054Z"
                                            fill="black" />
                                        <path
                                            d="M33.4489 26.4069C34.2122 26.4069 34.8311 25.7637 34.8311 24.9705C34.8311 24.1772 34.2122 23.5341 33.4489 23.5341H29.1322C28.3689 23.5341 27.75 24.1772 27.75 24.9705C27.75 25.7637 28.3689 26.4069 29.1322 26.4069H33.4489Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                <div class="info">
                                    <h3>
                                        Giao hàng toàn quốc
                                    </h3>
                                    <p>
                                        Miễn phí giao hàng với các đơn trị giá trên 300.000Đ
                                    </p>
                                </div>
                            </div>

                        <div class="swiper-slide item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40"
                                    fill="none">
                                    <path
                                        d="M36.2766 32.8575H35.8199C41.8521 25.6697 42.0766 15.2553 36.3588 7.81532C30.641 0.375322 20.5199 -2.08912 12.0221 1.88865C3.52326 5.86754 -1.06674 15.2186 0.986593 24.3753C3.03881 33.5309 11.181 40.0297 20.5644 39.9997C22.1188 39.9975 23.6677 39.8109 25.1788 39.4431C25.5721 39.382 25.9221 39.1586 26.1455 38.8286C26.3677 38.4975 26.4421 38.0897 26.3499 37.702C26.2588 37.3142 26.0088 36.9831 25.6621 36.7864C25.3144 36.5909 24.9021 36.5497 24.5221 36.6709C16.2366 38.6942 7.71325 34.3709 4.45103 26.4897C1.1877 18.6098 4.16215 9.52754 11.4544 5.1031C18.7466 0.678655 28.1755 2.23421 33.6599 8.76754C39.1432 15.3009 39.0421 24.8575 33.4199 31.272V30.0009C33.4199 29.212 32.781 28.572 31.991 28.572C31.2021 28.572 30.5621 29.2109 30.5621 30.0009V34.2864C30.5621 35.0753 31.201 35.7153 31.991 35.7153H36.2766C37.0655 35.7153 37.7055 35.0764 37.7055 34.2864C37.7055 33.4964 37.0666 32.8575 36.2766 32.8575Z"
                                        fill="black" />
                                    <path
                                        d="M30.5632 12.8586C30.5632 11.2809 29.2843 10.002 27.7066 10.002H13.421C11.8433 10.002 10.5644 11.2809 10.5644 12.8586V27.1442C10.5644 28.722 11.8433 30.0009 13.421 30.0009H27.7066C29.2843 30.0009 30.5632 28.722 30.5632 27.1442V12.8586ZM21.9921 12.8586V16.2586L21.2066 15.8731C20.8021 15.6698 20.3255 15.6698 19.921 15.8731L19.1355 16.2586V12.8586H21.9921ZM13.421 27.1442V12.8586H16.2777V18.5731C16.2788 19.0686 16.5377 19.5275 16.9588 19.7864C17.381 20.0453 17.9066 20.0675 18.3488 19.8442L20.5632 18.7442L22.7777 19.8442C22.9766 19.9464 23.1966 19.9998 23.4199 20.0009C23.6877 20.002 23.9499 19.9275 24.1766 19.7864C24.5955 19.5253 24.8488 19.0653 24.8477 18.572V12.8575H27.7043V27.1431H13.421V27.1442Z"
                                        fill="black" />
                                </svg>
                            </div>
                            <div class="info">
                                <h3>
                                    Đổi trả dễ dàng
                                </h3>
                                <p>
                                    Đổi trả trong 30 ngày đầu tiên cho tất cả các sản phẩm
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40"
                                    fill="none">
                                    <path
                                        d="M21.748 15C23.1279 14.9989 24.2467 13.88 24.2478 12.5V10C24.2456 8.62 23.1279 7.50111 21.748 7.5H17.9981C17.3082 7.5 16.7482 8.06 16.7482 8.75C16.7482 9.44 17.3082 10 17.9981 10H21.748V12.5H19.2481C17.8681 12.5022 16.7493 13.62 16.7482 15V17.5C16.7493 18.88 17.8681 19.9989 19.2481 20H22.9979C23.6879 20 24.2478 19.44 24.2478 18.75C24.2478 18.06 23.6879 17.5 22.9979 17.5H19.2481V15H21.748Z"
                                        fill="black" />
                                    <path
                                        d="M32.9974 20C33.6874 20 34.2474 19.44 34.2474 18.75V11.25C34.2474 10.56 33.6885 10 32.9974 10C32.3075 10 31.7475 10.56 31.7475 11.25V12.5H29.2476V8.75C29.2476 8.06 28.6876 7.5 27.9977 7.5C27.3077 7.5 26.7477 8.06 26.7477 8.75V12.5C26.7488 13.88 27.8677 14.9989 29.2476 15H31.7475V18.75C31.7475 19.44 32.3075 20 32.9974 20Z"
                                        fill="black" />
                                    <path
                                        d="M24.8734 2.242e-07C19.227 0.00111134 14.0217 3.05333 11.2618 7.97889L6.60089 3.31778C6.22646 2.95 5.71426 2.75778 5.19095 2.78778C4.66653 2.81778 4.17989 3.06778 3.85101 3.47667C-0.382122 8.37778 -0.631 15.5667 3.25437 20.7478C6.40201 24.8622 10.0874 28.5378 14.2083 31.6767C16.576 33.4733 19.4681 34.4411 22.4413 34.4322C24.039 34.4311 25.6244 34.1556 27.1288 33.6167C27.7232 34.3922 28.3143 35.2267 27.8343 36.2367C27.531 37.0111 26.7777 37.5156 25.9455 37.4989H17.3726C16.6826 37.4989 16.1227 38.0589 16.1227 38.7489C16.1227 39.4389 16.6826 40 17.3726 40H25.9455C27.7088 40.0022 29.3132 38.9822 30.0598 37.3856C30.8064 35.7889 30.5598 33.9033 29.4287 32.5522C30.162 32.1267 30.8542 31.6333 31.4975 31.08C31.8997 30.7556 32.1464 30.2756 32.1764 29.7589C32.2052 29.2422 32.0153 28.7378 31.6519 28.37L26.5 23.2178C25.8911 22.6167 25.0634 22.29 24.2078 22.3122C23.3523 22.3356 22.5435 22.7044 21.9668 23.3378L20.5602 24.9011C15.756 23 11.9517 19.1944 10.0507 14.39L11.614 12.9833C12.2762 12.3911 12.6506 11.5422 12.6406 10.6533C14.8094 5.87 19.5236 2.41556 24.8734 2.49889C30.4042 2.49778 35.3418 5.96556 37.2195 11.1689C39.096 16.3722 37.5094 22.1933 33.2519 25.7244C32.9952 25.9356 32.833 26.24 32.8019 26.57C32.7708 26.9 32.8719 27.23 33.083 27.4856C33.2941 27.7411 33.5996 27.9022 33.9296 27.9333C34.2607 27.9644 34.5896 27.8622 34.8451 27.65C39.916 23.4478 41.807 16.5167 39.5727 10.3211C37.3372 4.12778 31.4586 -0.00111089 24.8734 2.242e-07ZM9.94184 11.1256L7.73528 13.1111C7.35529 13.4533 7.22086 13.9933 7.39863 14.4733C9.53408 20.6011 14.3494 25.4167 20.4769 27.5522C20.9569 27.73 21.4969 27.5967 21.8391 27.2156L23.8245 25.0089C23.9356 24.8756 24.0978 24.7956 24.2723 24.7911C24.4467 24.7867 24.6134 24.8578 24.7312 24.9856L29.3498 29.6044C25.3389 32.68 19.7714 32.7144 15.7227 29.6878C11.7784 26.6833 8.25303 23.1667 5.23873 19.2289C2.20887 15.1789 2.25109 9.60333 5.34539 5.59889L9.96628 10.2189C10.0952 10.3356 10.1663 10.5033 10.1618 10.6778C10.1563 10.8522 10.0763 11.0156 9.94184 11.1256Z"
                                        fill="black" />
                                    <path
                                        d="M13.6228 38.75C13.6228 39.44 13.0628 40 12.3728 40C11.6829 40 11.1229 39.44 11.1229 38.75C11.1229 38.06 11.6829 37.5 12.3728 37.5C13.0639 37.5 13.6228 38.06 13.6228 38.75Z"
                                        fill="black" />
                                </svg>
                            </div>
                            <div class="info">
                                <h3>
                                    Hỗ trợ online 24/7
                                </h3>
                                <p>
                                    Luôn hỗ trợ khách hàng 24/24 các ngày trong tuần
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="38" viewBox="0 0 41 38"
                                    fill="none">
                                    <path
                                        d="M37.8424 7.32321H36.2783L36.2799 4.52747C36.2808 2.65004 34.755 1.12259 32.8776 1.12176L21.0071 1.11426C21.0063 1.11426 21.0063 1.11426 21.0055 1.11426C20.3297 1.11426 19.6947 1.37758 19.2164 1.85507L1.49614 19.5753C0.853666 20.2186 0.499512 21.0736 0.499512 21.9827C0.499512 22.8918 0.853666 23.7468 1.49614 24.3901L12.9957 35.8897C13.6591 36.553 14.5315 36.8855 15.4032 36.8855C16.2748 36.8855 17.1473 36.5539 17.8106 35.8897L28.9677 24.7326C29.2727 24.4276 29.2727 23.9326 28.9677 23.6276C28.6627 23.3227 28.1677 23.3227 27.8627 23.6276L16.7056 34.7848C15.9873 35.5031 14.819 35.5031 14.1007 34.7848L2.60111 23.2852C2.25362 22.9377 2.06196 22.4743 2.06196 21.9827C2.06196 21.4911 2.25362 21.0277 2.60111 20.6802L20.3213 2.96003C20.5038 2.77753 20.7471 2.6767 21.0055 2.6767L32.8759 2.68337C33.8917 2.68337 34.7175 3.51084 34.7167 4.52664L34.7133 11.0731H31.1943C30.891 11.0731 30.6168 10.9489 30.4185 10.7498C30.7451 10.6098 31.0518 10.4073 31.3184 10.1406C32.4409 9.01732 32.4409 7.19071 31.3184 6.06825C30.1951 4.94496 28.3685 4.94496 27.2461 6.06825C26.1236 7.19071 26.1236 9.01732 27.2461 10.1406C27.6627 10.5573 28.1761 10.8181 28.7135 10.9264C29.096 11.9247 30.0635 12.6355 31.1951 12.6355H34.7133L34.7108 16.3804C34.7108 16.6387 34.61 16.8812 34.4275 17.0637L32.2826 19.2086C31.9776 19.5136 31.9776 20.0086 32.2826 20.3136C32.5876 20.6186 33.0817 20.6186 33.3875 20.3136L35.5325 18.1687C36.0099 17.6912 36.2733 17.0562 36.2733 16.3812L36.2758 12.6355H37.8432C39.3073 12.6355 40.4998 11.4439 40.4998 9.97895C40.4981 8.51483 39.3065 7.32321 37.8424 7.32321ZM28.351 7.17238C28.6077 6.91572 28.9452 6.78739 29.2827 6.78739C29.6202 6.78739 29.9568 6.91572 30.2143 7.17238C30.2951 7.25404 30.3626 7.34404 30.4185 7.43904C29.561 7.70153 28.8869 8.38817 28.641 9.25314C28.5377 9.19564 28.4394 9.12398 28.3519 9.03565C27.8369 8.5215 27.8369 7.68653 28.351 7.17238ZM37.8424 11.0731H36.2766L36.2774 8.88565H37.8424C38.4457 8.88565 38.9365 9.37647 38.9365 9.97895C38.9357 10.5823 38.4449 11.0731 37.8424 11.0731Z"
                                        fill="black" />
                                    <path
                                        d="M13.1099 20.8252C13.2057 21.1711 13.5199 21.3969 13.8615 21.3969C13.9315 21.3969 14.0015 21.3877 14.0715 21.3686L22.0913 19.1361C22.5071 19.0203 22.7504 18.5895 22.6346 18.1737C22.5187 17.7587 22.0879 17.5154 21.6721 17.6312L13.6524 19.8628C13.2374 19.9786 12.9941 20.4094 13.1099 20.8252Z"
                                        fill="black" />
                                    <path
                                        d="M16.6398 21.856C16.2048 22.291 15.9648 22.8693 15.9648 23.4851C15.9648 24.1001 16.204 24.6784 16.6398 25.1134C17.0889 25.5626 17.6789 25.7867 18.2681 25.7867C18.858 25.7867 19.448 25.5617 19.8972 25.1134C20.7955 24.2151 20.7955 22.7535 19.8972 21.856C18.9989 20.9577 17.5381 20.9577 16.6398 21.856ZM18.7922 24.0085C18.5031 24.2976 18.0331 24.2976 17.7439 24.0085C17.6039 23.8685 17.5273 23.6826 17.5273 23.4843C17.5273 23.2868 17.6047 23.1002 17.7439 22.9602C17.8889 22.816 18.0781 22.7435 18.2681 22.7435C18.4581 22.7435 18.648 22.816 18.7922 22.9602C19.0814 23.2493 19.0814 23.7193 18.7922 24.0085Z"
                                        fill="black" />
                                    <path
                                        d="M20.2847 17.2045C21.183 16.3062 21.183 14.8446 20.2847 13.9471C19.8497 13.5122 19.2705 13.2722 18.6555 13.2722C18.0406 13.2722 17.4614 13.5113 17.0273 13.9471C16.129 14.8454 16.129 16.3062 17.0273 17.2045C17.4764 17.6537 18.0664 17.8778 18.6555 17.8778C19.2455 17.8778 19.8347 17.6537 20.2847 17.2045ZM18.1314 15.0513C18.2714 14.9113 18.4581 14.8346 18.6555 14.8346C18.8539 14.8346 19.0397 14.9113 19.1797 15.0513C19.4689 15.3404 19.4689 15.8104 19.1797 16.0996C18.8914 16.3887 18.4206 16.3887 18.1314 16.0996C17.8422 15.8104 17.8422 15.3404 18.1314 15.0513Z"
                                        fill="black" />
                                    <path
                                        d="M8.26924 19.2103C7.96425 18.9053 7.46927 18.9053 7.16428 19.2103L4.94519 21.4302C4.79853 21.5769 4.71603 21.7752 4.71603 21.9827C4.71603 22.1902 4.79853 22.3885 4.94519 22.5352L14.8515 32.4415C15.004 32.594 15.204 32.6698 15.404 32.6698C15.604 32.6698 15.804 32.5932 15.9565 32.4415L30.7676 17.6295C31.0726 17.3245 31.0726 16.8295 30.7676 16.5246L20.8613 6.61823C20.7146 6.47157 20.5163 6.38907 20.3088 6.38907C20.1013 6.38907 19.903 6.47157 19.7563 6.61823L11.5841 14.7905C11.2791 15.0954 11.2791 15.5904 11.5841 15.8954C11.8891 16.2004 12.3833 16.2004 12.6891 15.8954L20.3097 8.27484L29.111 17.0762L15.404 30.7841L6.6018 21.9827L8.26924 20.3153C8.57423 20.0103 8.57506 19.5161 8.26924 19.2103Z"
                                        fill="black" />
                                    <path
                                        d="M30.6251 21.1894C30.4193 21.1894 30.2176 21.2727 30.0726 21.4186C29.9277 21.5635 29.8435 21.7652 29.8435 21.971C29.8435 22.1769 29.9268 22.3785 30.0726 22.5235C30.2176 22.6685 30.4193 22.7527 30.6251 22.7527C30.8301 22.7527 31.0318 22.6693 31.1776 22.5235C31.3226 22.3785 31.4068 22.1769 31.4068 21.971C31.4068 21.7652 31.3234 21.5635 31.1776 21.4186C31.0318 21.2736 30.8301 21.1894 30.6251 21.1894Z"
                                        fill="black" />
                                    <path
                                        d="M10.4783 18.1053C10.6242 17.9603 10.7075 17.7595 10.7075 17.5529C10.7075 17.3479 10.6242 17.147 10.4783 17.0004C10.3333 16.8554 10.1325 16.7712 9.92668 16.7712C9.72086 16.7712 9.5192 16.8545 9.3742 17.0004C9.22837 17.1454 9.14504 17.347 9.14504 17.5529C9.14504 17.7587 9.22837 17.9603 9.3742 18.1053C9.52003 18.2512 9.72086 18.3345 9.92668 18.3345C10.1325 18.3345 10.3333 18.2512 10.4783 18.1053Z"
                                        fill="black" />
                                    <path
                                        d="M37.8424 7.32321H36.2783L36.2799 4.52747C36.2808 2.65004 34.755 1.12259 32.8776 1.12176L21.0071 1.11426C21.0063 1.11426 21.0063 1.11426 21.0055 1.11426C20.3297 1.11426 19.6947 1.37758 19.2164 1.85507L1.49614 19.5753C0.853666 20.2186 0.499512 21.0736 0.499512 21.9827C0.499512 22.8918 0.853666 23.7468 1.49614 24.3901L12.9957 35.8897C13.6591 36.553 14.5315 36.8855 15.4032 36.8855C16.2748 36.8855 17.1473 36.5539 17.8106 35.8897L28.9677 24.7326C29.2727 24.4276 29.2727 23.9326 28.9677 23.6276C28.6627 23.3227 28.1677 23.3227 27.8627 23.6276L16.7056 34.7848C15.9873 35.5031 14.819 35.5031 14.1007 34.7848L2.60111 23.2852C2.25362 22.9377 2.06196 22.4743 2.06196 21.9827C2.06196 21.4911 2.25362 21.0277 2.60111 20.6802L20.3213 2.96003C20.5038 2.77753 20.7471 2.6767 21.0055 2.6767L32.8759 2.68337C33.8917 2.68337 34.7175 3.51084 34.7167 4.52664L34.7133 11.0731H31.1943C30.891 11.0731 30.6168 10.9489 30.4185 10.7498C30.7451 10.6098 31.0518 10.4073 31.3184 10.1406C32.4409 9.01732 32.4409 7.19071 31.3184 6.06825C30.1951 4.94496 28.3685 4.94496 27.2461 6.06825C26.1236 7.19071 26.1236 9.01732 27.2461 10.1406C27.6627 10.5573 28.1761 10.8181 28.7135 10.9264C29.096 11.9247 30.0635 12.6355 31.1951 12.6355H34.7133L34.7108 16.3804C34.7108 16.6387 34.61 16.8812 34.4275 17.0637L32.2826 19.2086C31.9776 19.5136 31.9776 20.0086 32.2826 20.3136C32.5876 20.6186 33.0817 20.6186 33.3875 20.3136L35.5325 18.1687C36.0099 17.6912 36.2733 17.0562 36.2733 16.3812L36.2758 12.6355H37.8432C39.3073 12.6355 40.4998 11.4439 40.4998 9.97895C40.4981 8.51483 39.3065 7.32321 37.8424 7.32321ZM28.351 7.17238C28.6077 6.91572 28.9452 6.78739 29.2827 6.78739C29.6202 6.78739 29.9568 6.91572 30.2143 7.17238C30.2951 7.25404 30.3626 7.34404 30.4185 7.43904C29.561 7.70153 28.8869 8.38817 28.641 9.25314C28.5377 9.19564 28.4394 9.12398 28.3519 9.03565C27.8369 8.5215 27.8369 7.68653 28.351 7.17238ZM37.8424 11.0731H36.2766L36.2774 8.88565H37.8424C38.4457 8.88565 38.9365 9.37647 38.9365 9.97895C38.9357 10.5823 38.4449 11.0731 37.8424 11.0731Z"
                                        stroke="black" stroke-width="0.5" />
                                    <path
                                        d="M13.1099 20.8252C13.2057 21.1711 13.5199 21.3969 13.8615 21.3969C13.9315 21.3969 14.0015 21.3877 14.0715 21.3686L22.0913 19.1361C22.5071 19.0203 22.7504 18.5895 22.6346 18.1737C22.5187 17.7587 22.0879 17.5154 21.6721 17.6312L13.6524 19.8628C13.2374 19.9786 12.9941 20.4094 13.1099 20.8252Z"
                                        stroke="black" stroke-width="0.5" />
                                    <path
                                        d="M16.6398 21.856C16.2048 22.291 15.9648 22.8693 15.9648 23.4851C15.9648 24.1001 16.204 24.6784 16.6398 25.1134C17.0889 25.5626 17.6789 25.7867 18.2681 25.7867C18.858 25.7867 19.448 25.5617 19.8972 25.1134C20.7955 24.2151 20.7955 22.7535 19.8972 21.856C18.9989 20.9577 17.5381 20.9577 16.6398 21.856ZM18.7922 24.0085C18.5031 24.2976 18.0331 24.2976 17.7439 24.0085C17.6039 23.8685 17.5273 23.6826 17.5273 23.4843C17.5273 23.2868 17.6047 23.1002 17.7439 22.9602C17.8889 22.816 18.0781 22.7435 18.2681 22.7435C18.4581 22.7435 18.648 22.816 18.7922 22.9602C19.0814 23.2493 19.0814 23.7193 18.7922 24.0085Z"
                                        stroke="black" stroke-width="0.5" />
                                    <path
                                        d="M20.2847 17.2045C21.183 16.3062 21.183 14.8446 20.2847 13.9471C19.8497 13.5122 19.2705 13.2722 18.6555 13.2722C18.0406 13.2722 17.4614 13.5113 17.0273 13.9471C16.129 14.8454 16.129 16.3062 17.0273 17.2045C17.4764 17.6537 18.0664 17.8778 18.6555 17.8778C19.2455 17.8778 19.8347 17.6537 20.2847 17.2045ZM18.1314 15.0513C18.2714 14.9113 18.4581 14.8346 18.6555 14.8346C18.8539 14.8346 19.0397 14.9113 19.1797 15.0513C19.4689 15.3404 19.4689 15.8104 19.1797 16.0996C18.8914 16.3887 18.4206 16.3887 18.1314 16.0996C17.8422 15.8104 17.8422 15.3404 18.1314 15.0513Z"
                                        stroke="black" stroke-width="0.5" />
                                    <path
                                        d="M8.26924 19.2103C7.96425 18.9053 7.46927 18.9053 7.16428 19.2103L4.94519 21.4302C4.79853 21.5769 4.71603 21.7752 4.71603 21.9827C4.71603 22.1902 4.79853 22.3885 4.94519 22.5352L14.8515 32.4415C15.004 32.594 15.204 32.6698 15.404 32.6698C15.604 32.6698 15.804 32.5932 15.9565 32.4415L30.7676 17.6295C31.0726 17.3245 31.0726 16.8295 30.7676 16.5246L20.8613 6.61823C20.7146 6.47157 20.5163 6.38907 20.3088 6.38907C20.1013 6.38907 19.903 6.47157 19.7563 6.61823L11.5841 14.7905C11.2791 15.0954 11.2791 15.5904 11.5841 15.8954C11.8891 16.2004 12.3833 16.2004 12.6891 15.8954L20.3097 8.27484L29.111 17.0762L15.404 30.7841L6.6018 21.9827L8.26924 20.3153C8.57423 20.0103 8.57506 19.5161 8.26924 19.2103Z"
                                        stroke="black" stroke-width="0.5" />
                                    <path
                                        d="M30.6251 21.1894C30.4193 21.1894 30.2176 21.2727 30.0726 21.4186C29.9277 21.5635 29.8435 21.7652 29.8435 21.971C29.8435 22.1769 29.9268 22.3785 30.0726 22.5235C30.2176 22.6685 30.4193 22.7527 30.6251 22.7527C30.8301 22.7527 31.0318 22.6693 31.1776 22.5235C31.3226 22.3785 31.4068 22.1769 31.4068 21.971C31.4068 21.7652 31.3234 21.5635 31.1776 21.4186C31.0318 21.2736 30.8301 21.1894 30.6251 21.1894Z"
                                        stroke="black" stroke-width="0.5" />
                                    <path
                                        d="M10.4783 18.1053C10.6242 17.9603 10.7075 17.7595 10.7075 17.5529C10.7075 17.3479 10.6242 17.147 10.4783 17.0004C10.3333 16.8554 10.1325 16.7712 9.92668 16.7712C9.72086 16.7712 9.5192 16.8545 9.3742 17.0004C9.22837 17.1454 9.14504 17.347 9.14504 17.5529C9.14504 17.7587 9.22837 17.9603 9.3742 18.1053C9.52003 18.2512 9.72086 18.3345 9.92668 18.3345C10.1325 18.3345 10.3333 18.2512 10.4783 18.1053Z"
                                        stroke="black" stroke-width="0.5" />
                                </svg>
                            </div>
                            <div class="info">
                                <h3>
                                    Quà tặng hấp dẫn
                                </h3>
                                <p>
                                    Chương trình khuyến mãi cực lớn và hấp dẫn hàng tháng
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
</section>

<section class="awe-section-3">
    <section class="section_category">
        <div class="container">
            <div class="heading-home">
                <div class="site-animation">
                    <h2>Danh mục phổ biến</h2>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
            <div class="block-content">
                <div class="category-swiper swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                        <div class="item swiper-slide">
                            <a href="{{ route('productbycategory', ['id' => $category->id]) }}" title="{{ $category->name }}">
                                <div class="cate-img">
                                    <img width="130" height="130" class="lazyload img-responsive"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                                        data-src="{{ asset('storage/' . ($category->image_url ?? 'default.png')) }}"
                                        alt="{{ $category->name }}" />
                                </div>
                                <div class="cate-info">
                                    <div class="cate-name">{{ $category->name }}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Swiper JS -->
{{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 5, // Hiển thị tối đa 5 danh mục
            centeredSlides: true, // Hiển thị danh mục ở giữa
            spaceBetween: 30, // Khoảng cách giữa các danh mục
            loop: true, // Lặp lại swiper
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
            
            
        });

    </script> --}}
<style>
    .cate-img {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cate-img img {
        border-radius: 50%;
        object-fit: cover;
    }
</style>


<section class="awe-section-4">
    <section class="section_coupons">
        <div class="container">
            <div class="coupon-initial">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($promotions as $promo)
                        <div class="swiper-slide coupon-item">
                            <div class="coupon-item__inner">
                                <div class="coupon-item__right">
                                    <div class="cp-top">
                                        <div class="cp-top-title">
                                            <h3>{{ $promo->discount_type == 'percentage' ? 'Giảm ' . $promo->discount_value . '%' : 'Giảm ' . number_format($promo->discount_value) . '₫' }}</h3>
                                            <p>Đơn hàng từ {{ number_format($promo->min_purchase_amount) }}₫</p>
                                        </div>
                                        <div class="cp-top-detail">
                                            <p>Mã: <strong>{{ $promo->code }}</strong></p>
                                            <p>HSD: {{ \Carbon\Carbon::parse($promo->end_date)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="cp-bottom">
                                        <div class="cp-bottom-btn">
                                            <button class="dis_copy_2" data-copy="{{ $promo->code }}">Sao chép</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div> <!-- Vẫn giữ phân trang -->
                </div>
            </div>
        </div>
    </section>
</section>

{{-- <section class="awe-section-5">
        <link rel="preload" as="script" href="{{ asset('client/js/count-down4d9c.js') }}" />
<script src="{{ asset('client/js/count-down4d9c.js') }}" type="text/javascript"></script>
<section class="section_flash_sale module_product">
    <div class="container">
        <div class="heading-home">
            <div class="site-animation">
                <h2>
                    <a href="san-pham-noi-bat.html" title="Giảm giá sốc">Giảm giá sốc</a>
                </h2>

                <div class="timer">
                    <span class="text">Kết thúc sau:</span>
                    <div class="time" data-countdown="countdown" data-date="02-13-2025-12-00-00"></div>
                </div>

            </div>
        </div>

        <div class="block-product">
            <div class="deal-hot-swiper swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flashsale__item" data-pdid="29237846" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">
                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29237846" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail  ">
                                            <a class="image_thumb"
                                                href="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="{{ asset('client/images/blhess-simg-d0daf0-800x1200-max.jpg') }}"
                                                        data-src="{{ asset('client/images/blhess-simg-d0daf0-800x1200-max.jpg') }}"
                                                        alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="{{ asset('client/images/odraybrjkx1cudni9cmp-simg-d0daf0-800x1200-max.jpg') }}"
                                                        data-src="{{ asset('client/images/odraybrjkx1cudni9cmp-simg-d0daf0-800x1200-max.jpg') }}"
                                                        alt="V&#237; nữ d&#224;i cầm tay 2 ngăn k&#233;o nhiều ngăn tiện dụng" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">
                                                    Phụ kiện
                                                </div>
                                            </div>
                                            <h3 class="product-name"><a
                                                    href="vi-nu-dai-cam-tay-2-ngan-keo-nhieu-ngan-tien-dung.html"
                                                    title="Ví nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng">Ví
                                                    nữ dài cầm tay 2 ngăn kéo nhiều ngăn tiện dụng</a>
                                            </h3>
                                            <div class="bottom-action">
                                                <div class="price-box">
                                                    <span class="price">159.000₫</span>
                                                    <span class="compare-price"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>
                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="swiper-slide flashsale__item" data-pdid="29237810" data-inventory-quantity="0"
                        data-management="true" data-available="true">
                        <div class="item_product_main">
                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29237810" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail  ">
                                            <a class="image_thumb"
                                                href="tui-xach-nu-deo-cheo-da-pu-di-du-tiec-du-lich.html"
                                                title="Túi Xách Nữ Đeo Chéo Da Pu Đi Dự Tiệc Du Lịch">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="{{ asset('client/images/anh1.png') }}"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/pdwkie-simg-d0daf0-800x1200-max.png?v=1673363151100"
                                                        alt="T&#250;i X&#225;ch Nữ Đeo Ch&#233;o Da Pu Đi Dự Tiệc Du Lịch" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="{{ asset('client/images/anh2.png') }}"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/blhess-simg-d0daf0-800x1200-max.png?v=1673363152457"
                                                        alt="T&#250;i X&#225;ch Nữ Đeo Ch&#233;o Da Pu Đi Dự Tiệc Du Lịch" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">
                                                    Phụ kiện
                                                </div>
                                            </div>
                                            <h3 class="product-name"><a
                                                    href="tui-xach-nu-deo-cheo-da-pu-di-du-tiec-du-lich.html"
                                                    title="Túi Xách Nữ Đeo Chéo Da Pu Đi Dự Tiệc Du Lịch">Túi
                                                    Xách Nữ Đeo Chéo Da Pu Đi Dự Tiệc Du Lịch</a></h3>


                                            <div class="bottom-action">
                                                <div class="price-box">


                                                    <span class="price">300.000₫</span>
                                                    <span class="compare-price"></span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="swiper-slide flashsale__item" data-pdid="29237802" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">


                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29237802" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail sale " data-sale="-
        35%
        ">
                                            <a class="image_thumb" href="tui-xach-nu-hoa-tiet-thoi-trang.html"
                                                title="Túi xách nữ họa tiết thời trang">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="{{ asset('client/images/anh1.png') }}"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/jwonepcvkjlswxyixhqt-simg-d0daf0-800x1200-max.jpg?v=1673362979710"
                                                        alt="T&#250;i x&#225;ch nữ họa tiết thời trang" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="{{ asset('client/images/anh2.png') }}"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/odraybrjkx1cudni9cmp-simg-d0daf0-800x1200-max.jpg?v=1673362980193"
                                                        alt="T&#250;i x&#225;ch nữ họa tiết thời trang" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">

                                                    Phụ kiện

                                                </div>
                                            </div>
                                            <h3 class="product-name"><a href="tui-xach-nu-hoa-tiet-thoi-trang.html"
                                                    title="Túi xách nữ họa tiết thời trang">Túi xách nữ
                                                    họa tiết thời trang</a></h3>


                                            <div class="bottom-action">
                                                <div class="price-box">



                                                    <span class="price">150.000₫</span>

                                                    <span class="compare-price">230.000₫</span>




                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="swiper-slide flashsale__item" data-pdid="29237692" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">


                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29237692" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail sale " data-sale="-
        39%
        ">
                                            <a class="image_thumb"
                                                href="quan-short-nu-cap-cao-4-cuc-cap-cheo-cach-dieu.html"
                                                title="Quần Short Nữ Cạp Cao 4 Cúc Cạp Chéo Cách Điệu">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/rufkqze8ki024f0lzru6-simg-d0daf0-800x1200-max.jpg?v=1673361556170"
                                                        alt="Quần Short Nữ Cạp Cao 4 C&#250;c Cạp Ch&#233;o C&#225;ch Điệu" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/8ismbno6w1kd3xcq5zgk-simg-d0daf0-800x1200-max.jpg?v=1673361556707"
                                                        alt="Quần Short Nữ Cạp Cao 4 C&#250;c Cạp Ch&#233;o C&#225;ch Điệu" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">

                                                    Quần

                                                </div>
                                            </div>
                                            <h3 class="product-name"><a
                                                    href="quan-short-nu-cap-cao-4-cuc-cap-cheo-cach-dieu.html"
                                                    title="Quần Short Nữ Cạp Cao 4 Cúc Cạp Chéo Cách Điệu">Quần
                                                    Short Nữ Cạp Cao 4 Cúc Cạp Chéo Cách Điệu</a></h3>


                                            <div class="bottom-action">
                                                <div class="price-box">


                                                    <span class="price">100.000₫</span>
                                                    <span class="compare-price">165.000₫</span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="swiper-slide flashsale__item" data-pdid="29237671" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">


                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29237671" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail sale " data-sale="-
        44%
        ">
                                            <a class="image_thumb" href="quan-short-dui-nu.html"
                                                title="Quần short đũi nữ">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/pmioumgmndfegdh4amhg-simg-d0daf0-800x1200-max.jpg?v=1673361292573"
                                                        alt="Quần short đũi nữ" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/ugasezzc9qg3gcptfnf6-simg-d0daf0-800x1200-max.png?v=1673361293383"
                                                        alt="Quần short đũi nữ" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">

                                                    Quần

                                                </div>
                                            </div>
                                            <h3 class="product-name"><a href="quan-short-dui-nu.html"
                                                    title="Quần short đũi nữ">Quần short đũi nữ</a></h3>


                                            <div class="bottom-action">
                                                <div class="price-box">


                                                    <span class="price">90.000₫</span>
                                                    <span class="compare-price">160.000₫</span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="swiper-slide flashsale__item" data-pdid="29217357" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">


                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29217357" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail sale " data-sale="-
        40%
        ">
                                            <a class="image_thumb" href="quan-baggy-kaki-nu.html"
                                                title="Quần baggy kaki nữ">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/bub1xb-simg-d0daf0-800x1200-max.jpg?v=1673194785170"
                                                        alt="Quần baggy kaki nữ" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/bub1xb-simg-d0daf0-800x1200-max.jpg?v=1673194785170"
                                                        alt="Quần baggy kaki nữ" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">

                                                    Quần

                                                </div>
                                            </div>
                                            <h3 class="product-name"><a href="quan-baggy-kaki-nu.html"
                                                    title="Quần baggy kaki nữ">Quần baggy kaki nữ</a>
                                            </h3>


                                            <div class="bottom-action">
                                                <div class="price-box">



                                                    <span class="price">90.000₫</span>

                                                    <span class="compare-price">150.000₫</span>




                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="swiper-slide flashsale__item" data-pdid="29217317" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">


                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29217317" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail  ">
                                            <a class="image_thumb" href="quan-baggy-jeans-nu-phong-cach.html"
                                                title="Quần Baggy Jeans Nữ Phong Cách">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/kz6cb8fyvc2y67ftu3xx-simg-d0daf0-800x1200-max.jpg?v=1673193856937"
                                                        alt="Quần Baggy Jeans Nữ Phong C&#225;ch" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/0kzkbkmh1dck7chifown-simg-d0daf0-800x1200-max.jpg?v=1673193858470"
                                                        alt="Quần Baggy Jeans Nữ Phong C&#225;ch" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">

                                                    Quần

                                                </div>
                                            </div>
                                            <h3 class="product-name"><a href="quan-baggy-jeans-nu-phong-cach.html"
                                                    title="Quần Baggy Jeans Nữ Phong Cách">Quần Baggy
                                                    Jeans Nữ Phong Cách</a></h3>


                                            <div class="bottom-action">
                                                <div class="price-box">


                                                    Liên hệ


                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="swiper-slide flashsale__item" data-pdid="29217273" data-inventory-quantity="350"
                        data-available="true">
                        <div class="item_product_main">


                            <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                class="variants product-action wishItem" data-cart-form
                                data-id="product-actions-29217273" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 pd-right-0">
                                        <div class="product-thumbnail sale " data-sale="-
        45%
        ">
                                            <a class="image_thumb" href="ao-phong-thun-nu-form-rong.html"
                                                title="Áo Phông, Thun Nữ Form Rộng">
                                                <div class="product-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max.jpg?v=1673192703397"
                                                        alt="&#193;o Ph&#244;ng, Thun Nữ Form Rộng" />
                                                </div>

                                                <div class="product-image second-image">
                                                    <img class="lazy img-responsive" width="480" height="480"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/456/491/products/bcbchsie3amjuunh6y8j-simg-e8409c-967x967-max.jpg?v=1673192704330"
                                                        alt="&#193;o Ph&#244;ng, Thun Nữ Form Rộng" />
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="product-info">
                                            <div class="lofi-product">
                                                <div class="product-type">

                                                    Áo

                                                </div>
                                            </div>
                                            <h3 class="product-name"><a href="ao-phong-thun-nu-form-rong.html"
                                                    title="Áo Phông, Thun Nữ Form Rộng">Áo Phông, Thun
                                                    Nữ Form Rộng</a></h3>


                                            <div class="bottom-action">
                                                <div class="price-box">


                                                    <span class="price">109.000₫</span>
                                                    <span class="compare-price">199.000₫</span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="flashsale__bottom" style="display:none">
                                            <div class="flashsale__label">
                                                <b class="flashsale__sold-qty"></b> sản phẩm đã bán
                                            </div>


                                            <div class="flashsale__progressbar  ">
                                                <div class="flashsale___percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
</section>
</section> --}}

{{-- <section class="awe-section-6">
        <div class="section_banner_featured feature_banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="banner_left">
                            <a href="san-pham-moi.html" title="Lofi Style" class="image_hover">
                                <img width="770" height="471" class="lazy img-responsive"
                                    src="{{ asset('client/images/anh1.png') }}"
data-src="//bizweb.dktcdn.net/100/456/491/themes/864044/assets/feature_banner_1.png?1708522613834"
alt="Lofi Style" />
</a>
</div>
</div>
<div class="col-lg-4 col-12">
    <div class="row">
        <div class="banner_right mb-30 col-lg-12 col-md-6 col-12">
            <a href="san-pham-noi-bat.html" title="Lofi Style" class="image_hover">
                <img width="370" height="220" class="lazy img-responsive"
                    src="{{ asset('client/images/anh2.png') }}"
                    data-src="//bizweb.dktcdn.net/100/456/491/themes/864044/assets/feature_banner_2.png?1708522613834"
                    alt="Lofi Style" />
            </a>
        </div>
        <div class="banner_right col-lg-12 col-md-6 col-12">
            <a href="flash-sale.html" title="Lofi Style" class="image_hover">
                <img width="370" height="220" class="lazy img-responsive"
                    src="{{ asset('client/images/anh3.png') }}"
                    data-src="//bizweb.dktcdn.net/100/456/491/themes/864044/assets/feature_banner_3.png?1708522613834"
                    alt="Lofi Style" />
            </a>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section> --}}

<section class="awe-section-7">
    <div class="section_product_new module_product">
        <div class="container">
            <div class="heading-home">
                <div class="site-animation">
                    <h2><a href="san-pham-moi.html" title="Sản phẩm mới">Sản phẩm mới</a></h2>
                </div>
            </div>


            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="block-product">
                        <div class="product-new-swiper swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($products as $product)
                                <div class="swiper-slide">
                                    <div class="item_product_main" data-url="{{ route('productDetail', $product->id) }}"
                                        data-id="{{ $product->id }}">
                                        <form action="{{ route('cart.add', $product->id) }}" method="post"
                                            class="variants product-action wishItem" data-cart-form
                                            data-id="product-actions-{{ $product->id }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="product-thumbnail">
                                                <a class="image_thumb" href="{{ route('productDetail', $product->id) }}"
                                                    title="{{ $product->name }}">
                                                    <div class="product-image">
                                                        @php
                                                        $images = explode(',', $product->image); // Tách ảnh thành mảng
                                                        $firstImage = isset($images[0]) ? trim($images[0]) : null; // Lấy ảnh đầu tiên
                                                        @endphp
                                                        @if($firstImage)
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="{{ asset('storage/' . $firstImage) }}"
                                                            alt="{{ $product->name }}" />
                                                        @else
                                                        <img class="lazy img-responsive" width="300" height="300"
                                                            src="{{ asset('images/no-image.png') }}"
                                                            alt="Không có ảnh" />
                                                        @endif
                                                    </div>
                                                </a>
                                                <div class="action-cart">

                                                    <a title="Xem nhanh"
                                                        href="{{ route('productDetail', $product->id) }}"
                                                        class="quick-view btn-views">
                                                        🔍
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="lofi-product">
                                                    <div class="product-type"></div>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="{{ route('productDetail', $product->id) }}"
                                                        title="{{ $product->name }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                                <div class="bottom-action">
                                                    <div class="price-box">
                                                        @if($product->discount_price && $product->discount_price < $product->price)
                                                            <span class="price text-success font-weight-bold">
                                                                {{ number_format($product->discount_price, 0, ',', '.') }}₫
                                                            </span>
                                                            <span class="compare-price text-danger"
                                                                style="text-decoration: line-through;">
                                                                {{ number_format($product->price, 0, ',', '.') }}₫
                                                            </span>
                                                            @else
                                                            @php
                                                            $variant = $product->variants->first(); // Lấy một biến thể bất kỳ
                                                            @endphp

                                                            @if($variant)
                                                            <div class="price-box">
                                                                @if($variant->discount_price && $variant->discount_price < $variant->price)
                                                                    <span class="price text-success font-weight-bold">
                                                                        {{ number_format($variant->discount_price, 0, ',', '.') }}₫
                                                                    </span>
                                                                    <span class="compare-price text-danger"
                                                                        style="text-decoration: line-through;">
                                                                        {{ number_format($variant->price, 0, ',', '.') }}₫
                                                                    </span>
                                                                    @else
                                                                    <span class="price font-weight-bold">
                                                                        {{ number_format($variant->price, 0, ',', '.') }}₫
                                                                    </span>
                                                                    @endif
                                                            </div>
                                                            @endif

                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="swiper-pagination"></div>
        </div>
    </div>
    </div>
    </div>
</section>

<section class="awe-section-8">
    <section class="section_feedback">
        <div class="container">
            <div class="heading-home">
                <div class="site-animation">
                    <h2>Đánh giá khách hàng</h2>
                </div>
            </div>
            <div class="block-content">
                <div class="swiper-container testimonial-carousel">
                    <div class="swiper-wrapper">
                        @forelse ($featuredComments as $comment)
                        <div class="swiper-slide single-testimonial">
                            <div class="testimonials-wrapper">
                                <div class="desc">
                                    <strong>Nội Dung:</strong> {{ $comment->content }}<br>
                                    <strong>Đánh giá:</strong> {!! str_repeat('⭐', $comment->rating) !!}
                                </div>
                                {{-- <div class="testimonials-img">
                                            <img width="90" height="90" class="lazy img-responsive"
                                                src="{{ asset('client/images/feedback_1.png') }}"
                                data-src="{{ asset('client/images/feedback_1.png') }}" alt="User">
                            </div> --}}
                            <div class="testimonials-person-info">
                                <h3>tên khách hàng: {{ $comment->user->name ?? $comment->name }}</h3>
                                {{-- <p>{{ $comment->user->email ?? $comment->email }}</p> --}}

                                @if ($comment->product)
                                <p>
                                    <strong>Xem sản phẩm được đánh giá:
                                        <a href="{{ route('product.detail', ['id' => $comment->product->id]) }}">
                                            {{ $comment->product->name }}
                                        </a>
                                    </strong>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide single-testimonial">
                        <div class="testimonials-wrapper">
                            <div class="desc text-center">
                                💬 Hiện tại chưa có đánh giá nào cả. <br>
                                Chúc bạn một ngày tràn đầy năng lượng và niềm vui! 🌈✨
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>

        </div>
    </section>


</section>

<section class="awe-section-9">
    <div class="section_blog module_product">
        <div class="container">
            <div class="heading-home">
                <div class="site-animation">
                    <h2><a href="tin-tuc.html" title="Tin tức">Tin tức</a></h2>
                </div>
            </div>
            <div class="latestblogs">
                <div class="blog-swiper swiper-container">
                    <div class="swiper-wrapper">

                        @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="blogs-item">
                                <div class="post-image">
                                    <a class="thumb" href="{{ route('showpost', $post) }}" title="{{ $post->title }}">
                                        <img class="lazy" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="post-body">
                                    <div class="time-post f">
                                        <svg><!-- clock icon SVG --></svg>
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('l, d/m/Y') }}
                                    </div>
                                    <div class="time-post">
                                        <svg><!-- user icon SVG --></svg>
                                        <span>{{ $post->author ?? 'Team Lofi' }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{ route('showpost', $post) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                                    </h3>
                                    {{-- <p class="justify">{{ Str::limit(strip_tags($post->content), 150) }}</p> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach


                        {{-- <div class="swiper-slide">
                                <div class="blogs-item">
                                    <div class="post-image">
                                        <a class="thumb" href="tu-tin-dien-ao-nhun-nguc-chuan-trend-2023.html"
                                            title="Tự tin diện áo nhún ngực chuẩn trend 2023">
                                            <img class="lazy" src="{{ asset('client/images/tin1.png') }}"
                        data-src="{{ asset('client/images/tin1.png') }}"
                        alt="Tự tin diện áo nhún ngực chuẩn trend 2023">
                        </a>
                    </div>
                    <div class="post-body">
                        <div class="time-post f">
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="clock"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="svg-inline--fa fa-clock fa-w-16">
                                <path fill="currentColor"
                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216zm-148.9 88.3l-81.2-59c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h14c6.6 0 12 5.4 12 12v146.3l70.5 51.3c5.4 3.9 6.5 11.4 2.6 16.8l-8.2 11.3c-3.9 5.3-11.4 6.5-16.8 2.6z"
                                    class=""></path>
                            </svg>
                            Thứ Ba,
                            28/02/2023
                        </div>
                        <div class="time-post">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="svg-inline--fa fa-user fa-w-14">
                                <path fill="currentColor"
                                    d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"
                                    class=""></path>
                            </svg>
                            <span>Rainbow - store</span>
                        </div>
                        <h3>
                            <a href="tu-tin-dien-ao-nhun-nguc-chuan-trend-2023.html"
                                title="Tự tin diện áo nhún ngực chuẩn trend 2023">Tự tin diện áo
                                nhún ngực chuẩn trend 2023</a>
                        </h3>

                        <p class="justify">Thêm một lưu ý nữa, nàng nên cân nhắc chọn mẫu áo lót
                            phù hợp khi mặc&nbsp;áo nhún ngực. Với một số mẫu&nbsp;áo nhún
                            ngực&nbsp;mà...</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="blogs-item">
                    <div class="post-image">
                        <a class="thumb" href="tu-tin-dien-ao-nhun-nguc-chuan-trend-2023.html"
                            title="Tự tin diện áo nhún ngực chuẩn trend 2023">
                            <img class="lazy" src="{{ asset('client/images/tin1.png') }}"
                                data-src="{{ asset('client/images/tin1.png') }}"
                                alt="Tự tin diện áo nhún ngực chuẩn trend 2023">
                        </a>
                    </div>
                    <div class="post-body">
                        <div class="time-post f">
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="clock"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="svg-inline--fa fa-clock fa-w-16">
                                <path fill="currentColor"
                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216zm-148.9 88.3l-81.2-59c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h14c6.6 0 12 5.4 12 12v146.3l70.5 51.3c5.4 3.9 6.5 11.4 2.6 16.8l-8.2 11.3c-3.9 5.3-11.4 6.5-16.8 2.6z"
                                    class=""></path>
                            </svg>
                            Thứ Ba,
                            28/02/2023
                        </div>
                        <div class="time-post">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="svg-inline--fa fa-user fa-w-14">
                                <path fill="currentColor"
                                    d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"
                                    class=""></path>
                            </svg>
                            <span>Rainbow - store</span>
                        </div>
                        <h3>
                            <a href="tu-tin-dien-ao-nhun-nguc-chuan-trend-2023.html"
                                title="Tự tin diện áo nhún ngực chuẩn trend 2023">Tự tin diện áo
                                nhún ngực chuẩn trend 2023</a>
                        </h3>

                        <p class="justify">Thêm một lưu ý nữa, nàng nên cân nhắc chọn mẫu áo lót
                            phù hợp khi mặc&nbsp;áo nhún ngực. Với một số mẫu&nbsp;áo nhún
                            ngực&nbsp;mà...</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    </div>
    </div>
    </div>

</section>

{{-- <section class="awe-section-10">
        <section class="section_instagram">
            <div class="container">
                <div class="heading-home">
                    <div class="site-animation">
                        <h2><a href="https://www.instagram.com/" title="Theo dõi instagram">Theo dõi
                                instagram</a></h2>
                    </div>
                </div>
                <div class="block-content">
                    <div class="instagram-swiper swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="instagram-item">
                                    <a href="#" class="clearfix" title="Lofi Style">
                                        <img width="170" height="170" class="lazy img-responsive"
                                            src="{{ asset('client/images/ig1.png') }}"
data-src="{{ asset('client/images/ig1.png') }}" alt="Lofi Style">
<div class="icon">
    <img width="35" height="35" src="{{ asset('client/images/ig-con.png') }}"
        alt="Lofi Style">
</div>
</a>
</div>
</div>

<div class="swiper-slide">
    <div class="instagram-item">
        <a href="#" class="clearfix" title="Lofi Style">
            <img width="170" height="170" class="lazy img-responsive"
                src="{{ asset('client/images/ig1.png') }}"
                data-src="{{ asset('client/images/ig1.png') }}" alt="Lofi Style">
            <div class="icon">
                <img width="35" height="35" src="{{ asset('client/images/ig-con.png') }}"
                    alt="Lofi Style">
            </div>
        </a>
    </div>
</div>

<div class="swiper-slide">
    <div class="instagram-item">
        <a href="#" class="clearfix" title="Lofi Style">
            <img width="170" height="170" class="lazy img-responsive"
                src="{{ asset('client/images/ig1.png') }}"
                data-src="{{ asset('client/images/ig1.png') }}" alt="Lofi Style">
            <div class="icon">
                <img width="35" height="35" src="{{ asset('client/images/ig-con.png') }}"
                    alt="Lofi Style">
            </div>
        </a>
    </div>
</div>

<div class="swiper-slide">
    <div class="instagram-item">
        <a href="#" class="clearfix" title="Lofi Style">
            <img width="170" height="170" class="lazy img-responsive"
                src="{{ asset('client/images/ig1.png') }}"
                data-src="{{ asset('client/images/ig1.png') }}" alt="Lofi Style">
            <div class="icon">
                <img width="35" height="35" src="{{ asset('client/images/ig-con.png') }}"
                    alt="Lofi Style">
            </div>
        </a>
    </div>
</div>

<div class="swiper-slide">
    <div class="instagram-item">
        <a href="#" class="clearfix" title="Lofi Style">
            <img width="170" height="170" class="lazy img-responsive"
                src="{{ asset('client/images/ig1.png') }}"
                data-src="{{ asset('client/images/ig1.png') }}" alt="Lofi Style">
            <div class="icon">
                <img width="35" height="35" src="{{ asset('client/images/ig-con.png') }}"
                    alt="Lofi Style">
            </div>
        </a>
    </div>
</div>

<div class="swiper-slide">
    <div class="instagram-item">
        <a href="#" class="clearfix" title="Lofi Style">
            <img width="170" height="170" class="lazy img-responsive"
                src="{{ asset('client/images/ig1.png') }}"
                data-src="{{ asset('client/images/ig1.png') }}" alt="Lofi Style">
            <div class="icon">
                <img width="35" height="35" src="{{ asset('client/images/ig-con.png') }}"
                    alt="Lofi Style">
            </div>
        </a>
    </div>
</div>
</div>
<div class="swiper-pagination"></div>
</div>
<script>
    var swiper = new Swiper('.instagram-swiper', {
        slidesPerView: 6,
        spaceBetween: 20,
        slidesPerColumn: 1,
        slidesPerColumnFill: 'row',
        slidesPerGroup: 1,
        navigation: false,
        pagination: {
            el: '.instagram-swiper .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 20
            }
        }
    });
</script>
</div>
</div>
</section>
</section> --}}
@endsection

@section('js')
<script>
    var swiper = new Swiper('.home-slider', {
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.home-slider .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.home-slider .swiper-button-next',
            prevEl: '.home-slider .swiper-button-prev',
        },
    });
</script>

<script>
    var swiper = new Swiper('.category-swiper', {
        slidesPerView: 6,
        spaceBetween: 30,
        slidesPerColumn: 1,
        slidesPerColumnFill: 'row',
        slidesPerGroup: 1,
        navigation: false,
        pagination: {
            el: '.category-swiper .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 30,
            }
        }
    });
</script>

<script>
    $(document).on('click', '.dis_copy_2', function(e) {
        e.preventDefault();
        var copyText = $(this).attr('data-copy');
        var copyTextarea = document.createElement("textarea");
        copyTextarea.textContent = copyText;
        document.body.appendChild(copyTextarea);
        copyTextarea.select();
        document.execCommand("copy");
        document.body.removeChild(copyTextarea);
        var cur_text = $(this).text();
        var $cur_btn = $(this);
        $(this).addClass("disabled");
        $(this).text("Đã lưu");
        $(this).parent().addClass('active');
        setTimeout(function() {
            $cur_btn.removeClass("disabled");
            $cur_btn.parent().removeClass('active');
            $cur_btn.text(cur_text);
        }, 2500)
    })
</script>
<script>
    window.falshSale = {
        type: "hours",
        dateStart: "",
        dateFinish: "",
        hourStart: "00:00",
        hourFinish: "24",
        activeDay: "7",
        finishAction: "show",
        percentMin: "40",
        percentMax: "80",
        maxInStock: "350",
        useSoldQuantity: false,
        quantityType: "sold",
        timestamp: new Date().getTime(),
    }
</script>
<script src="{{ asset('client/js/flashsale4d9c.js') }}" defer></script>
<script>
    var swiperwish = new Swiper('.product-new-swiper', {
        slidesPerView: 4,
        loop: false,
        grabCursor: true,
        spaceBetween: 30,
        slidesPerColumn: 2,
        slidesPerColumnFill: 'row',
        roundLengths: true,
        slideToClickedSlide: false,
        navigation: {
            nextEl: '.product-new-swiper .swiper-button-next',
            prevEl: '.product-new-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.product-new-swiper .swiper-pagination',
            clickable: true,
        },
        autoplay: false,
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 4,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });
</script>
<script>
    var swiper = new Swiper('.testimonial-carousel', {
        slidesPerView: 2,
        spaceBetween: 30,
        slidesPerColumn: 1,
        slidesPerColumnFill: 'row',
        slidesPerGroup: 1,
        navigation: false,
        pagination: {
            el: '.testimonial-carousel .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 2,
                spaceBetween: 30,
            }
        }
    });
</script>
<script>
    var swiperwish = new Swiper('.blog-swiper', {
        slidesPerView: 3,
        loop: false,
        grabCursor: true,
        spaceBetween: 30,
        roundLengths: true,
        slideToClickedSlide: false,
        navigation: {
            nextEl: '.blog-swiper .swiper-button-next',
            prevEl: '.blog-swiper .swiper-button-prev',
        },
        autoplay: false,
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
</script>
<script>
    var swiperwish = new Swiper('.service-swiper', {
        slidesPerView: 4,
        loop: false,
        grabCursor: true,
        spaceBetween: 40,
        roundLengths: true,
        slideToClickedSlide: false,
        navigation: {
            nextEl: '.service-swiper .swiper-button-next',
            prevEl: '.service-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.service-swiper .swiper-pagination',
            clickable: true,
        },
        autoplay: false,
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            500: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    });
</script>
<style>
    .product-thumbnail img {
        display: block;
        width: 300px;
        height: 300px;
        object-fit: cover;
        /* Đảm bảo ảnh vừa khung */
    }

    .product-thumbnail:hover img {
        opacity: 1 !important;
        /* Ngăn ảnh biến mất khi hover */
        visibility: visible !important;
    }
</style>

{{--
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener("click", function (event) {
                // Kiểm tra nếu click vào phần tử hoặc icon bên trong nút giỏ hàng
                const targetButton = event.target.closest(".add-to-cart");

                if (!targetButton) {
                    console.warn("⚠ Click không phải vào nút giỏ hàng.");
                    return;
                }

                event.preventDefault(); // Ngăn trang reload nếu có

                const productId = targetButton.getAttribute("data-product-id");

                if (!productId) {
                    console.error("❌ Lỗi: `data-product-id` không tồn tại hoặc bị null.");
                    return;
                }

                console.log("✅ Đã nhấn vào nút giỏ hàng:", targetButton);
                console.log("📌 Product ID:", productId);

                // Kiểm tra xem thẻ CSRF token có tồn tại không
                const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
                if (!csrfTokenElement) {
                    console.error("❌ Lỗi: CSRF token không tìm thấy!");
                    alert("❌ Lỗi bảo mật! Không thể thêm vào giỏ hàng.");
                    return;
                }

                const csrfToken = csrfTokenElement.getAttribute("content");

                // Gửi request thêm vào giỏ hàng
                fetch("/add-to-cart", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("❌ Lỗi từ server: " + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("📌 Server response:", data);
                        alert("✅ Sản phẩm đã được thêm vào giỏ hàng!");

                        // Cập nhật số lượng giỏ hàng trên giao diện nếu có phần tử .cart-count
                        const cartCountElement = document.querySelector(".cart-count");
                        if (cartCountElement && data.totalItems !== undefined) {
                            cartCountElement.textContent = data.totalItems;
                        }
                    })
                    .catch(error => {
                        console.error("❌ Lỗi khi thêm sản phẩm vào giỏ hàng:", error);
                        alert("❌ Đã xảy ra lỗi, vui lòng thử lại!");
                    });
            });
        });
    </script> --}}

@endsection