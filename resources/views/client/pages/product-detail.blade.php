@extends('client.layouts.main')

@section('title', 'Chi tiết sản phẩm')
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

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
                    <a itemprop="item" href="ao-phong.html" title="Áo phông">
                        <span itemprop="name">Áo phông</span>
                        <meta itemprop="position" content="2" />

                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <strong>
                        <span itemprop="name">&#193;o Ph&#244;ng, Thun Nữ Form Rộng</span>
                        <meta itemprop="position" content="3" />
                    </strong>
                </li>
            </ul>
        </div>
    </section>
    <section class="product layout-product" itemscope itemtype="https://schema.org/Product">
        <meta itemprop="url" content="//lofi-style.mysapo.net/ao-phong-thun-nu-form-rong">
        <meta itemprop="name" content="Áo Phông, Thun Nữ Form Rộng">
        <meta itemprop="image"
            content="http://bizweb.dktcdn.net/thumb/grande/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max.jpg?v=1673192703397">
        <meta itemprop="description"
            content="Mô Tả Sản Phẩm:

    Áo Phông&nbsp;được thiết kế đẹp, chuẩn form, đường may sắc xảo, vải cotton dày, mịn, thấm hút mồ hôi tạo sự thoải mái khi mặc!

    Toàn bộ đều là những mẫu mã mới . Giúp bạn tự tin diện lên người

    Chất vải cotton... mềm mịn, co dãn và thoáng mát -
    Thiết kế trẻ trung năng động, hợp xu hướng thời trang quốc tế.
    Đường may tinh xảo, tạo nên gu thời trang sành điệu cho giới trẻ -
    Dễ dàng phối hợp cùng nhiều phụ kiện khác mang đến phong cách thời trang riêng cho mỗi người, khéo léo lựa chọn trang phục cùng phụ kiện phù hợp, bạn sẽ có set đồ đẹp mắt... -
    Là 1 item không thể thiếu trong tủ đồ của các bạn.">
        <meta itemprop="model" content="">
        <div class="d-none" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <div class="inventory_quantity d-none" itemscope itemtype="http://schema.org/ItemAvailability">

                <span class="a-stock" itemprop="supersededBy">
                    Còn hàng
                </span>

            </div>
            <link itemprop="availability" href="http://schema.org/InStock">
            <meta itemprop="priceCurrency" content="VND">
            <meta itemprop="price" content="109000">
            <meta itemprop="url" content="https://lofi-style.mysapo.net/ao-phong-thun-nu-form-rong">

            <meta itemprop="priceSpecification" content="199000">

            <meta itemprop="priceValidUntil" content="2099-01-01">
        </div>

        <div class="container">
            <div class="details-product">
                <div class="row">
                    <div class="product-detail-left product-images col-12 col-md-12 col-lg-6 col-left">
                        <div class="product-image-block relative">
                            <!-- Ảnh lớn - Dạng slider -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper" id="lightgallery">
                                    @foreach($images as $index => $image)
                                        @php
                                            $imagePath = asset('storage/' . $image); // Sử dụng đường dẫn chuẩn
                                        @endphp
                                        <a class="swiper-slide" data-hash="{{ $index }}" href="{{ $imagePath }}" title="Click để xem">
                                            <img height="540" width="540"
                                                 src="{{ $imagePath }}"
                                                 alt="{{ $product->name }}"
                                                 data-image="{{ $imagePath }}"
                                                 class="img-responsive mx-auto d-block lazy" />
                                        </a>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <!-- Ảnh nhỏ - Hiển thị tất cả ảnh -->
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach($images as $index => $image)
                                        @php
                                            $imagePath = asset('storage/' . $image);
                                        @endphp
                                        <div class="swiper-slide" data-hash="{{ $index }}">
                                            <div class="p-100">
                                                <img height="80" width="80"
                                                     src="{{ $imagePath }}"
                                                     alt="{{ $product->name }}"
                                                     data-image="{{ $imagePath }}"
                                                     class="lazy" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="details-pro col-12 col-md-12 col-lg-6 col-center">
                        <div class="title-product">
                            <h1>{{ $product->name }}</h1>
                        </div>

                        <div class="inventory_quantity">
                            <span class="mb-break">
                                <span class="stock-brand-title">Thương hiệu:</span>
                                <span class="a-vendor">

                                    Đang cập nhật

                                </span>
                            </span>
                            <span class="line">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="mb-break">
                                <span class="stock-brand-title">Tình trạng:</span>


                                <span class="a-stock">
                                    Còn hàng
                                </span>


                            </span>
                        </div>

                        <form enctype="multipart/form-data" data-cart-form id="add-to-cart-form"
                            action="{{ route('cart.add') }}" method="POST" class="form-inline">
                            <div id="alert-message" class="alert-box" style="display: none;">
                                <span id="alert-text"></span>
                            </div>
                            <style>
                                .alert-box {
                                    position: fixed;
                                    top: 20px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                    background: rgba(255, 0, 0, 0.9);
                                    color: white;
                                    padding: 10px 20px;
                                    border-radius: 5px;
                                    font-weight: bold;
                                    z-index: 9999;
                                    display: none;
                                    transition: opacity 0.5s ease-in-out;
                                }
                            </style>
                            @php
                                // Lấy một biến thể bất kỳ của sản phẩm
                                $variant = $product->variants->first();
                                $price = $variant ? $variant->price : $product->price;
                                $discountPrice = $variant && $variant->discount_price ? $variant->discount_price : null;
                            @endphp

                                <div class="price-box clearfix">
                                    <!-- Giá Khuyến Mại -->
                                    <span class="special-price">
                                        <span class="price product-price">
                                            <span id="dynamic-new-price">
                                                {{ number_format($discountPrice ?? $price, 0, ',', '.') }}₫
                                            </span>
                                        </span>
                                        <meta itemprop="price" content="{{ $discountPrice ?? $price }}">
                                        <meta itemprop="priceCurrency" content="VND">
                                    </span>

                                    <!-- Giá Gốc (Chỉ hiển thị nếu có giá khuyến mãi) -->
                                    @if($discountPrice && $discountPrice < $price)
                                        <span class="old-price" itemprop="priceSpecification" itemscope=""
                                            itemtype="http://schema.org/priceSpecification">
                                            <del class="price product-price-old" id="dynamic-old-price">
                                                {{ number_format($price, 0, ',', '.') }}₫
                                            </del>
                                            <meta itemprop="price" content="{{ $price }}">
                                            <meta itemprop="priceCurrency" content="VND">
                                        </span>
                                    @endif
                                </div>



                                <div class='product-promotion rounded-sm' id='lofi-salebox'>
                                    <h3 class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
                                        <img src="{{ asset('client/images/icon-product-promotion4d9c.png') }}"
                                            data-src="{{ asset('client/images/icon-product-promotion4d9c.png') }}"
                                            alt="&#193;o Ph&#244;ng, Thun Nữ Form Rộng"
                                            data-image="{{ asset('client/images/icon-product-promotion4d9c.png') }}"
                                            width='22' height='22' class='mr-2' />
                                        Khuyến mại - ưu đãi
                                    </h3>
                                    <ul class="promotion-box">
                                        <li>Đồng giá Ship toàn quốc 25.000đ</li>
                                        <li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>
                                        <li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>
                                        <li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
                                    </ul>
                                </div>
                                <!-- Thêm phần phương thức thanh toán -->
                                <div class="payment-method rounded-sm">
                                    <h3 class="payment-heading d-inline-flex align-items-center">
                                        Phương thức thanh toán
                                    </h3>

                                    <div class="payment-options">
                                        <label class="payment-option">
                                            <input type="radio" name="payment_method" value="cod" checked> Thanh toán khi nhận hàng (COD)
                                        </label>
                                        <label class="payment-option">
                                            <input type="radio" name="payment_method" value="bank_transfer"> Chuyển khoản ngân hàng
                                        </label>
                                    </div>

                                    <div id="bank-details" class="bank-details" style="display: none;">
                                        <p><strong>Thông tin chuyển khoản:</strong></p>
                                        <p>Nội dung: Thanh toán đơn hàng: {{ $product->name }}</p>
                                    </div>
                                </div>

                            <div class="form-product">

                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="color_id" id="selected_color" value="">
                                    <input type="hidden" name="size_id" id="selected_size" value="">
                                    <input type="hidden" name="quantity" id="selected_quantity" value="1">

                                    <div class="select-swatch">
                                        <!-- Hiển thị màu sắc -->
                                        <div class="swatch-color swatch clearfix">
                                            <div class="options-title">Màu sắc:</div>
                                            @foreach ($colors as $color)
                                                <div data-value="{{ $color->id }}" class="swatch-element color {{ strtolower($color->color_name) }} available">
                                                    <input id="swatch-0-{{ $color->id }}" type="radio" name="option-0" value="{{ $color->id }}" class="color-option"/>
                                                    <label for="swatch-0-{{ $color->id }}" title="{{ $color->color_name }}" style="background-color: {{ $color->color_code }};"></label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Hiển thị Size -->
                                        <div class="swatch clearfix">
                                            <div class="options-title">Size:</div>
                                            @foreach ($sizes as $size)
                                                <div data-value="{{ $size->id }}" class="swatch-element {{ strtolower($size->size_name) }} available">
                                                    <input id="swatch-1-{{ $size->id }}" type="radio" name="option-1" value="{{ $size->id }}" class="size-option"/>
                                                    <label for="swatch-1-{{ $size->id }}">{{ strtoupper($size->size_name) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Chọn số lượng -->
                                    <div class="clearfix form-group">
                                        <div class="flex-quantity">
                                            <div class="custom custom-btn-number">
                                                <div class="input_number_product form-control">
                                                    <button type="button" class="btn_num num_1 button button_qty btn-decrease">-</button>
                                                    <input type="number" id="qty" name="quantity" value="1" min="1" class="form-control prd_quantity">
                                                    <button type="button" class="btn_num num_2 button button_qty btn-increase">+</button>
                                                </div>
                                            </div>
                                            <span id="stock-info" class="stock-info">Số lượng: --</span> <!-- Hiển thị số lượng tồn kho -->
                                        </div>

                                        <!-- Nút Mua Ngay & Thêm vào Giỏ Hàng -->
                                        <div class="btn-mua button_actions clearfix">
                                                {{-- <button type="button" class="btn btn-lg btn-gray btn_buy btn-buy-now" id="buy-now-btn">
                                                    Mua ngay
                                                </button> --}}
                                            <button type="submit" class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart">
                                                Thêm vào giỏ hàng
                                            </button>
                                        </div>
                                    </div>

                                </form>

                                <div class="product-hotline ">
                                    <p>
                                        Gọi đặt mua <a class="link" href="tel:19006750">19006750</a> (9:00 -
                                        21:00)
                                    </p>
                                    <ul class="social-media" role="list">
                                        <li>Chia sẻ ngay: </li>
                                        <li class="social-media__item social-media__item--facebook">
                                            <a title="Chia sẻ lên Facebook"
                                                href="https://www.facebook.com/sharer.php?u=https://lofi-style.mysapo.net/ao-phong-thun-nu-form-rong"
                                                target="_blank" rel="noopener" aria-label="Chia sẻ lên Facebook"><svg
                                                    focusable="false" class="icon icon--facebook" viewBox="0 0 30 30">
                                                    <path
                                                        d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm3.2142857-17.1429611h-2.1428678v-2.1425646c0-.5852979.8203285-1.07160109 1.0714928-1.07160109h1.071375v-2.1428925h-2.1428678c-2.3564786 0-3.2142536 1.98610393-3.2142536 3.21449359v2.1425646h-1.0714822l.0032143 2.1528011 1.0682679-.0099086v7.499969h3.2142536v-7.499969h2.1428678v-2.1428925z"
                                                        fill="currentColor" fill-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="social-media__item social-media__item--pinterest">
                                            <a title="Chia sẻ lên Pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=https://lofi-style.mysapo.net/ao-phong-thun-nu-form-rong&amp;"
                                                target="_blank" rel="noopener" aria-label="Pinterest"><svg
                                                    focusable="false" class="icon icon--pinterest" role="presentation"
                                                    viewBox="0 0 30 30">
                                                    <path
                                                        d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm-.4492946-22.49876954c-.3287968.04238918-.6577148.08477836-.9865116.12714793-.619603.15784625-1.2950238.30765013-1.7959124.60980792-1.3367356.80672832-2.26284291 1.74754848-2.88355361 3.27881599-.1001431.247352-.10374313.4870343-.17702448.7625149-.47574032 1.7840923.36779138 3.6310327 1.39120339 4.2696951.1968419.1231267.6448551.3405257.8093833.0511377.0909873-.1603963.0706852-.3734014.1265202-.5593764.036883-.1231267.1532436-.3547666.1263818-.508219-.0455542-.260514-.316041-.4256572-.4299438-.635367-.230748-.4253041-.2421365-.8027267-.3541701-1.3723228.0084116-.0763633.0168405-.1527266.0253733-.2290899.0340445-.6372108.1384107-1.0968422.3287968-1.5502554.5593198-1.3317775 1.4578212-2.07273488 2.9088231-2.5163011.324591-.09899963 1.2400541-.25867013 1.7200175-.1523539.2867042.05078464.5734084.10156927.8600087.1523539 1.0390064.33760307 1.7953931.9602003 2.2007079 1.9316992.252902.6061594.3275507 1.7651044.1517724 2.5415071-.0833199.3679287-.0705641.6832289-.1770418 1.0168107-.3936666 1.2334841-.9709174 2.3763639-2.2765854 2.6942337-.8613761.2093567-1.5070793-.3321303-1.7200175-.8896824-.0589159-.1545509-.1598205-.4285603-.1011297-.6865243.2277711-1.0010987.5562045-1.8969797.8093661-2.8969995.24115-.9528838-.2166421-1.7048063-.9358863-1.8809146-.8949186-.2192233-1.585328.6350139-1.8211644 1.1943903-.1872881.4442919-.3005678 1.2641823-.1517724 1.8557085.0471811.1874265.2666617.689447.2276672.8640842-.1728187.7731269-.3685356 1.6039823-.5818373 2.3635745-.2219729.7906632-.3415527 1.5999416-.5564641 2.3639276-.098793.3507651-.0955738.7263439-.1770244 1.092821v.5337977c-.0739045.3379758-.0194367.9375444.0505042 1.2703809.0449484.2137505-.0261175.4786388.0758948.6357396.0020943.1140055.0159752.1388388.0506254.2031582.3168026-.0095136.7526829-.8673992.9106342-1.118027.3008274-.477913.5797431-.990879.8093833-1.5506281.2069844-.5042174.2391769-1.0621226.4046917-1.60104.1195798-.3894861.2889369-.843272.328918-1.2707535h.0252521c.065614.2342095.3033024.403727.4805692.5334446.5563429.4077482 1.5137774.7873678 2.5547742.5337977 1.1769151-.2868184 2.1141687-.8571599 2.7317812-1.702982.4549537-.6225776.7983583-1.3445472 1.0624066-2.1600633.1297394-.4011574.156982-.8454494.2529193-1.2711066.2405269-1.0661438-.0797199-2.3511383-.3794396-3.0497261-.9078995-2.11694836-2.8374975-3.32410832-5.918897-3.27881604z"
                                                        fill="currentColor" fill-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="social-media__item social-media__item--twitter">
                                            <a title="Chia sẻ lên Twitter"
                                                href="https://twitter.com/share?url=https://lofi-style.mysapo.net/ao-phong-thun-nu-form-rong"
                                                target="_blank" rel="noopener" aria-label="Tweet on Twitter"><svg
                                                    focusable="false" class="icon icon--twitter" role="presentation"
                                                    viewBox="0 0 30 30">
                                                    <path
                                                        d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm3.4314771-20.35648929c-.134011.01468929-.2681239.02905715-.4022367.043425-.2602865.05139643-.5083383.11526429-.7319208.20275715-.9352275.36657324-1.5727317 1.05116784-1.86618 2.00016964-.1167278.3774214-.1643635 1.0083696-.0160821 1.3982464-.5276368-.0006268-1.0383364-.0756643-1.4800457-.1737-1.7415129-.3873214-2.8258768-.9100285-4.02996109-1.7609946-.35342035-.2497018-.70016357-.5329286-.981255-.8477679-.09067071-.1012178-.23357785-.1903178-.29762142-.3113357-.00537429-.0025553-.01072822-.0047893-.0161025-.0073446-.13989429.2340643-.27121822.4879125-.35394965.7752857-.32626393 1.1332446.18958607 2.0844643.73998215 2.7026518.16682678.187441.43731214.3036696.60328392.4783178h.01608215c-.12466715.041834-.34181679-.0159589-.45040179-.0360803-.25715143-.0482143-.476235-.0919607-.69177643-.1740215-.11255464-.0482142-.22521107-.09675-.3378675-.1449642-.00525214 1.251691.69448393 2.0653071 1.55247643 2.5503267.27968679.158384.67097143.3713625 1.07780893.391484-.2176789.1657285-1.14873321.0897268-1.47198429.0581143.40392643.9397285 1.02481929 1.5652607 2.09147249 1.9056375.2750861.0874928.6108975.1650857.981255.1593482-.1965482.2107446-.6162514.3825321-.8928439.528766-.57057.3017572-1.2328489.4971697-1.97873466.6450108-.2991075.0590785-.61700464.0469446-.94113107.0941946-.35834678.0520554-.73320321-.02745-1.0537875-.0364018.09657429.053325.19312822.1063286.28958036.1596536.2939775.1615821.60135.3033482.93309.4345875.59738036.2359768 1.23392786.4144661 1.93859037.5725286 1.4209286.3186642 3.4251707.175291 4.6653278-.1740215 3.4539354-.9723053 5.6357529-3.2426035 6.459179-6.586425.1416246-.5754053.162226-1.2283875.1527803-1.9126768.1716718-.1232517.3432215-.2465035.5148729-.3697553.4251996-.3074947.8236703-.7363286 1.118055-1.1591036v-.00765c-.5604729.1583679-1.1506672.4499036-1.8661597.4566054v-.0070232c.1397925-.0495.250515-.1545429.3619908-.2321358.5021089-.3493285.8288003-.8100964 1.0697678-1.39826246-.1366982.06769286-.2734778.13506429-.4101761.20275716-.4218407.1938214-1.1381067.4719375-1.689256.5144143-.6491893-.5345357-1.3289754-.95506074-2.6061215-.93461789z"
                                                        fill="currentColor" fill-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="e-tabs">
                    <div class="accordion">

                        <div class="accordion-item current" id="product_tabs-1">
                            <div class="accordion-title">
                                Mô tả sản phẩm
                                <i class="icon">
                                    <svg height="15px" id="Layer_1" style="enable-background:new 0 0 15 15;" version="1.1"
                                        viewBox="0 0 512 512" width="15px" xmlns="http://www.w3.org/2000/svg">
                                        <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 " />
                                    </svg>
                                </i>
                            </div>
                            <div class="accordion-contant">
                                <div class="rte product_getcontent">
                                    <div class="ba-text-fpt">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        


                        <div class="accordion-item" id="product_tabs-2">
                            <div class="accordion-title">
                                Chính sách giao hàng
                                <i class="icon">
                                    
                                    <!DOCTYPE svg
                                        PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                    <svg height="15px" id="Layer_1" style="enable-background:new 0 0 15 15;"
                                        version="1.1" viewBox="0 0 512 512" width="15px" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 " />
                                    </svg>
                                </i>
                            </div>
                            <div class="accordion-contant">
                                <div class="rte">


                                    <div class="ba-text-fpt">
                                        <p><b>LOFI STYLE&nbsp;</b>- Thương hiệu thời trang của người trẻ hiện
                                            đại! Ra đời vào năm 2016, Rainbow - store&nbsp;luôn nỗ lực với sứ mệnh tạo
                                            nên xu hướng thời trang mang đến sự tin tưởng&nbsp;và năng lượng
                                            tích cực cho khách hàng.&nbsp;<b>LOFI STYLE&nbsp;</b>mang hơi thở
                                            của thời trang&nbsp;<strong><em>HIỆN ĐẠI, TRẺ TRUNG, PHÓNG
                                                    KHOÁNG</em></strong>&nbsp;với những mẫu thiết kế bắt nhịp xu
                                            hướng thịnh hành và có tính ứng dụng cao trong mọi hoàn cảnh.</p>
                                        <p>&nbsp;</p>
                                        <p><em><strong>HÃY ĐẾN&nbsp;</strong><b>LOFI STYLE</b><strong>&nbsp;ĐỂ
                                                    TRẢI NGHIỆM SỰ KHÁC BIỆT!</strong></em></p>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="accordion-item" id="product_tabs-3">
                            <div class="accordion-title">
                                Chính sách đổi trả
                                <i class="icon">
                                    
                                    <!DOCTYPE svg
                                        PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                    <svg height="15px" id="Layer_1" style="enable-background:new 0 0 15 15;"
                                        version="1.1" viewBox="0 0 512 512" width="15px" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 " />
                                    </svg>
                                </i>
                            </div>
                            <div class="accordion-contant">
                                <div class="rte">


                                    <div class="ba-text-fpt">
                                        <p><b>LOFI STYLE&nbsp;</b>- Thương hiệu thời trang của người trẻ hiện
                                            đại! Ra đời vào năm 2025, Rainbow - store&nbsp;luôn nỗ lực với sứ mệnh tạo
                                            nên xu hướng thời trang mang đến sự tin tưởng&nbsp;và năng lượng
                                            tích cực cho khách hàng.&nbsp;<b>Rainbow - store&nbsp;</b>mang hơi thở
                                            của thời trang&nbsp;<strong><em>HIỆN ĐẠI, TRẺ TRUNG, PHÓNG
                                                    KHOÁNG</em></strong>&nbsp;với những mẫu thiết kế bắt nhịp xu
                                            hướng thịnh hành và có tính ứng dụng cao trong mọi hoàn cảnh.</p>
                                        <p>&nbsp;</p>
                                        <p><em><strong>HÃY ĐẾN&nbsp;</strong><b>Rainbow - store</b><strong>&nbsp;ĐỂ
                                                    TRẢI NGHIỆM SỰ KHÁC BIỆT!</strong></em></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                    
  @php
    $user = auth()->user();
    $userCanReview = $user && \App\Models\Order::where('user_id', $user->id)
        ->where('status', 'Đã giao thành công')
        ->whereHas('items', fn($query) => $query->where('product_id', $product->id))
        ->exists();

    // Kiểm tra xem người dùng đã đánh giá sản phẩm chưa
    $hasReviewed = $user && \App\Models\Comment::where('user_id', $user->id)
        ->where('product_id', $product->id)
        ->exists();
@endphp

<div class="accordion-item" id="product_tabs-4">
    <div class="accordion-title">
        Đánh giá & Bình luận
        <i class="icon">
            <svg height="15px" id="Layer_1" style="enable-background:new 0 0 15 15;"
                version="1.1" viewBox="0 0 512 512" width="15px" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 " />
            </svg>
        </i>
    </div>
    <div class="accordion-contant">
        <div class="rte">
            <div class="ba-text-fpt">
                @php
                    $productRating = App\Models\Comment::getAverageStarRating($product->id);
                @endphp
                <div class="product-rating-summary mb-4">
                    <div class="average-rating">
                        {!! $productRating['html'] !!}
                        <span class="rating-value">{{ $productRating['average'] }}/5</span>
                    </div>
                    <div class="rating-count">
                        Dựa trên {{ $productRating['count'] }} đánh giá
                    </div>
                </div>

                @if ($comments->where('is_visible', true)->isEmpty())
                    <p class="no-comments">Chưa có đánh giá nào</p>
                @else
                    @foreach ($comments->where('is_visible', true) as $comment)
                        <div class="comment-box">
                            <div class="comment-header">
                                <div class="comment-info">
                                    <p class="comment-author">
                                        {{ $comment->user_id ? optional($comment->user)->name : ($comment->name ?? 'Khách') }}
                                    </p>
                                    <div class="comment-meta">
                                        <span class="comment-date">{{ $comment->created_at_formatted }}</span>
                                    </div>
                                </div>
                                <div class="comment-rating">
                                    {!! $comment->star_rating !!}
                                </div>
                            </div>
                            <div class="comment-content">
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

                <hr class="comment-divider">

                @if ($userCanReview && !$hasReviewed)
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="review-title">Viết đánh giá của bạn</h4>
                            <form action="{{ route('comment.store', $product->id) }}" method="POST">
                                @csrf
                                <div class="form-group rating-group">
                                    <label class="rating-label">Đánh giá của bạn:</label>
                                    <div class="star-rating-input">
                                        <input type="radio" id="star5" name="rating" value="5" required />
                                        <label for="star5" title="5 sao">★</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="4 sao">★</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="3 sao">★</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="2 sao">★</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" title="1 sao">★</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung đánh giá:</label>
                                    <textarea class="form-control" id="content" name="content" rows="5" required placeholder="Hãy chia sẻ cảm nhận của bạn về sản phẩm..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-submit">Gửi đánh giá</button>
                            </form>
                        </div>
                    </div>
                @elseif($hasReviewed)
                    <p class="alert alert-success">Bạn đã đánh giá sản phẩm này rồi.</p>
                @elseif(auth()->check())
                    <p class="alert alert-warning">Bạn cần mua sản phẩm này và nhận hàng thành công để có thể đánh giá.</p>
                @endif
            </div>
        </div>
    </div>
</div>

                        
                        <style>
                            /* Rating styles */
                            .product-rating-summary {
                                background: #f9f9f9;
                                padding: 15px;
                                border-radius: 5px;
                                margin-bottom: 20px;
                            }
                            
                            .average-rating {
                                font-size: 24px;
                                margin-bottom: 5px;
                            }
                            
                            .rating-value {
                                font-size: 18px;
                                font-weight: bold;
                                color: #333;
                                margin-left: 10px;
                                vertical-align: middle;
                            }
                            
                            .rating-count {
                                font-size: 14px;
                                color: #666;
                            }
                            
                            /* Comment box styles */
                            .comment-box {
                                border-bottom: 1px solid #eee;
                                padding: 15px 0;
                            }
                            
                            .comment-header {
                                display: flex;
                                justify-content: space-between;
                                margin-bottom: 10px;
                            }
                            
                            .comment-author {
                                font-weight: 600;
                                margin: 0;
                                color: #333;
                            }
                            
                            .comment-meta {
                                font-size: 12px;
                                color: #888;
                            }
                            
                            .comment-content {
                                color: #555;
                                line-height: 1.6;
                            }
                            
                            /* Star rating styles */
                            .star-rating, .star-rating-input {
                                display: inline-block;
                                font-size: 20px;
                            }
                            
                            .star-rating .fa-star, 
                            .star-rating-input label {
                                color: #ffc107;
                            }
                            
                            .star-rating .far,
                            .star-rating-input input:not(:checked) ~ label {
                                color: #ccc;
                            }
                            
                            .star-rating-input input {
                                display: none;
                            }
                            
                            .star-rating-input label {
                                float: right;
                                padding: 0 5px;
                                cursor: pointer;
                                transition: all 0.2s;
                            }
                            
                            .star-rating-input label:hover,
                            .star-rating-input label:hover ~ label {
                                color: #ffc107;
                            }
                            
                            /* Form styles */
                            .review-title {
                                font-size: 18px;
                                margin-bottom: 20px;
                                color: #333;
                            }
                            
                            .rating-group {
                                margin-bottom: 20px;
                            }
                            
                            .rating-label {
                                display: block;
                                margin-bottom: 8px;
                                font-weight: 600;
                            }
                            
                            .btn-submit {
                                background: #ff6b6b;
                                color: white;
                                padding: 10px 25px;
                                border: none;
                                border-radius: 4px;
                                font-weight: 600;
                                transition: all 0.3s;
                            }
                            
                            .btn-submit:hover {
                                background: #ff5252;
                            }
                            
                            .no-comments {
                                color: #888;
                                font-style: italic;
                                text-align: center;
                                padding: 20px 0;
                            }
                            
                            .comment-divider {
                                margin: 25px 0;
                                border-color: #eee;
                            }
                        </style>
                        
                        <script>
                            $(document).ready(() => {
                                // Accordion functionality
                                $('.accordion-title').click(function() {
                                    const accordionItem = $(this).parent('.accordion-item');
                                    const scrollHeight = accordionItem.find('.accordion-contant').prop("scrollHeight");
                                    accordionItem[0].style.setProperty('--max-height', scrollHeight + 'px');
                                    accordionItem.toggleClass('current');
                                });
                                
                                // Star rating interaction
                                $('.star-rating-input label').hover(function() {
                                    $(this).prevAll('label').addBack().css('color', '#ffc107');
                                    $(this).nextAll('label').css('color', '#ccc');
                                });
                                
                                $('.star-rating-input').mouseleave(function() {
                                    $(this).find('label').css('color', '#ccc');
                                    $(this).find('input:checked').nextAll('label').addBack().css('color', '#ffc107');
                                });
                            });
                        </script>


            </div>





            <div class="productRelate">
                <div class="heading-home">
                    <div class="site-animation">
                        <h2><a href="ao-phong.html" title="Sản phẩm liên quan">Sản phẩm liên quan</a></h2>
                    </div>
                </div>
                <div class="product-relate-swiper swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item_product_main" data-id="292172622">
                                <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                    class="variants product-action wishItem" data-cart-form
                                    data-id="product-actions-29217262" enctype="multipart/form-data">
                                    <div class="product-thumbnail  ">
                                        <a class="image_thumb" href="ao-phong-nu-mau-hong.html"
                                            title="Áo phông nữ màu hồng">
                                            <div class="product-image">
                                                <img class="lazy img-responsive" width="300" height="300"
                                                    src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    data-src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    alt="&#193;o ph&#244;ng nữ m&#224;u hồng" />
                                            </div>

                                            <div class="product-image second-image">
                                                <img class="lazy img-responsive" width="300" height="300"
                                                    src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    data-src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    alt="&#193;o ph&#244;ng nữ m&#224;u hồng" />
                                            </div>

                                        </a>
                                        <div class="action-cart">
                                            <a href="javascript:void(0)"
                                                class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                data-wish="ao-phong-nu-mau-hong" tabindex="0"
                                                title="Thêm vào yêu thích">
                                                <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                                                    viewBox="0 0 18 17" fill="none">
                                                    <path
                                                        d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                        stroke="#000" stroke-width="1.5px" stroke-linecap="round"
                                                        stroke-linejoin="round" fill="none"></path>
                                                </svg>
                                            </a>
                                            <a title="Xem nhanh" href="ao-phong-nu-mau-hong.html"
                                                data-handle="ao-phong-nu-mau-hong" class="quick-view btn-views">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                        fill="black" />
                                                    <path
                                                        d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                        fill="black" />
                                                    <path
                                                        d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                        fill="black" />
                                                    <path
                                                        d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                        fill="black" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="lofi-product">
                                            <div class="product-type">

                                                Áo

                                            </div>
                                        </div>

                                        <h3 class="product-name"><a href="ao-phong-nu-mau-hong.html"
                                                title="Áo phông nữ màu hồng">Áo phông nữ màu hồng</a></h3>


                                        <div class="bottom-action">
                                            <div class="price-box">



                                                169.000₫



                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="item_product_main" data-id="292172622">
                                <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                    class="variants product-action wishItem" data-cart-form
                                    data-id="product-actions-29217262" enctype="multipart/form-data">
                                    <div class="product-thumbnail  ">
                                        <a class="image_thumb" href="ao-phong-nu-mau-hong.html"
                                            title="Áo phông nữ màu hồng">
                                            <div class="product-image">
                                                <img class="lazy img-responsive" width="300" height="300"
                                                    src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    data-src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    alt="&#193;o ph&#244;ng nữ m&#224;u hồng" />
                                            </div>

                                            <div class="product-image second-image">
                                                <img class="lazy img-responsive" width="300" height="300"
                                                    src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    data-src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    alt="&#193;o ph&#244;ng nữ m&#224;u hồng" />
                                            </div>

                                        </a>
                                        <div class="action-cart">
                                            <a href="javascript:void(0)"
                                                class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                data-wish="ao-phong-nu-mau-hong" tabindex="0"
                                                title="Thêm vào yêu thích">
                                                <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                                                    viewBox="0 0 18 17" fill="none">
                                                    <path
                                                        d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                        stroke="#000" stroke-width="1.5px" stroke-linecap="round"
                                                        stroke-linejoin="round" fill="none"></path>
                                                </svg>
                                            </a>
                                            <a title="Xem nhanh" href="ao-phong-nu-mau-hong.html"
                                                data-handle="ao-phong-nu-mau-hong" class="quick-view btn-views">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                        fill="black" />
                                                    <path
                                                        d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                        fill="black" />
                                                    <path
                                                        d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                        fill="black" />
                                                    <path
                                                        d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                        fill="black" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="lofi-product">
                                            <div class="product-type">

                                                Áo

                                            </div>
                                        </div>

                                        <h3 class="product-name"><a href="ao-phong-nu-mau-hong.html"
                                                title="Áo phông nữ màu hồng">Áo phông nữ màu hồng</a></h3>


                                        <div class="bottom-action">
                                            <div class="price-box">



                                                169.000₫



                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="item_product_main" data-id="292172622">
                                <form action="https://lofi-style.mysapo.net/cart/add" method="post"
                                    class="variants product-action wishItem" data-cart-form
                                    data-id="product-actions-29217262" enctype="multipart/form-data">
                                    <div class="product-thumbnail  ">
                                        <a class="image_thumb" href="ao-phong-nu-mau-hong.html"
                                            title="Áo phông nữ màu hồng">
                                            <div class="product-image">
                                                <img class="lazy img-responsive" width="300" height="300"
                                                    src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    data-src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    alt="&#193;o ph&#244;ng nữ m&#224;u hồng" />
                                            </div>

                                            <div class="product-image second-image">
                                                <img class="lazy img-responsive" width="300" height="300"
                                                    src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    data-src="http://127.0.0.1:5500/bizweb.dktcdn.net/100/456/491/products/ujfb9jsyjr0rygdja304-simg-cf603b-938x938-max4325.jpg?v=1673192703397"
                                                    alt="&#193;o ph&#244;ng nữ m&#224;u hồng" />
                                            </div>

                                        </a>
                                        <div class="action-cart">
                                            <a href="javascript:void(0)"
                                                class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                data-wish="ao-phong-nu-mau-hong" tabindex="0"
                                                title="Thêm vào yêu thích">
                                                <svg xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                                                    viewBox="0 0 18 17" fill="none">
                                                    <path
                                                        d="M1.34821 8.7354C0.330209 5.77575 1.60274 2.00897 4.40225 1.2018C5.92926 0.663681 7.96523 1.20177 8.98323 2.81612C10.0012 1.20177 12.0372 0.663681 13.5642 1.2018C16.6182 2.27803 17.6363 5.77575 16.6183 8.7354C15.3458 13.3094 10.2557 16 8.98323 16C7.71073 15.7309 2.87522 13.5784 1.34821 8.7354Z"
                                                        stroke="#000" stroke-width="1.5px" stroke-linecap="round"
                                                        stroke-linejoin="round" fill="none"></path>
                                                </svg>
                                            </a>
                                            <a title="Xem nhanh" href="ao-phong-nu-mau-hong.html"
                                                data-handle="ao-phong-nu-mau-hong" class="quick-view btn-views">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.3638 8.90944C13.0122 8.90944 12.7276 9.19411 12.7276 9.54567V11.8277L8.72278 7.82367C8.47389 7.57478 8.071 7.57478 7.82289 7.82367C7.574 8.07178 7.574 8.47467 7.82289 8.72356L11.8269 12.7283H9.54489C9.19333 12.7283 8.90867 13.013 8.90867 13.3646C8.90867 13.7161 9.19333 14.0008 9.54489 14.0008H13.363C13.7153 14 14 13.7146 14 13.3638V9.54567C14 9.19411 13.7153 8.90944 13.3638 8.90944Z"
                                                        fill="black" />
                                                    <path
                                                        d="M0.636222 5.09056C0.987778 5.09056 1.27244 4.80589 1.27244 4.45433V2.17311L5.27722 6.17711C5.40167 6.30156 5.56422 6.36378 5.72756 6.36378C5.89011 6.36378 6.05344 6.30156 6.17711 6.17711C6.426 5.929 6.426 5.52611 6.17711 5.27722L2.17311 1.27322H4.45511C4.80667 1.27322 5.09133 0.988556 5.09133 0.637C5.09056 0.284667 4.80589 0 4.45433 0H0.636222C0.284667 0 0 0.285444 0 0.636222V4.45433C0 4.80589 0.284667 5.09056 0.636222 5.09056Z"
                                                        fill="black" />
                                                    <path
                                                        d="M5.27722 7.82289L1.27244 11.8269V9.54489C1.27244 9.19333 0.987778 8.90867 0.636222 8.90867C0.284667 8.90944 0 9.19411 0 9.54567V13.3638C0 13.7153 0.285444 14 0.636222 14H4.45433C4.80589 14 5.09056 13.7153 5.09056 13.3638C5.09056 13.0122 4.80589 12.7276 4.45433 12.7276H2.17311L6.17711 8.72278C6.426 8.47389 6.426 8.071 6.17711 7.82289C5.929 7.574 5.52533 7.574 5.27722 7.82289Z"
                                                        fill="black" />
                                                    <path
                                                        d="M8.27244 6.36378C8.435 6.36378 8.59833 6.30156 8.722 6.17711L12.7268 2.17311V4.45511C12.7268 4.80667 13.0114 5.09133 13.363 5.09133C13.7153 5.09056 14 4.80589 14 4.45433V0.636222C14 0.284667 13.7146 0 13.3638 0H9.54567C9.19411 0 8.90944 0.284667 8.90944 0.636222C8.90944 0.987778 9.19411 1.27244 9.54567 1.27244H11.8277L7.82367 5.27722C7.57478 5.52611 7.57478 5.929 7.82367 6.17711C7.94733 6.30156 8.10989 6.36378 8.27244 6.36378Z"
                                                        fill="black" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="lofi-product">
                                            <div class="product-type">

                                                Áo

                                            </div>
                                        </div>

                                        <h3 class="product-name"><a href="ao-phong-nu-mau-hong.html"
                                                title="Áo phông nữ màu hồng">Áo phông nữ màu hồng</a></h3>


                                        <div class="bottom-action">
                                            <div class="price-box">



                                                169.000₫



                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.tabs-title li').on('click', function(e) {
            $('.tabs-title li, .tab-content').removeClass('current');
            $(this).addClass('current');
            $('.' + $(this).data('tab') + '').addClass('current');

            var active = $(this);
            var left = active.position().left;
            var currScroll = $(this).parent('.tabs-title').scrollLeft();
            var contWidth = $(this).parent('.tabs-title').width() / 2;
            var activeOuterWidth = active.outerWidth() / 2;
            left = left + currScroll - contWidth + activeOuterWidth;

            $(this).parent('.tabs-title').animate({
                scrollLeft: left
            }, 'slow');
        });


        var getLimit = 6;
        var alias = 'ao-phong-thun-nu-form-rong';


        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 5,
            slidesPerView: 10,
            freeMode: true,
            lazy: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            hashNavigation: true,
            slideToClickedSlide: true,
            breakpoints: {
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                500: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1199: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
            },
            navigation: {
                nextEl: '.gallery-thumbs .swiper-button-next',
                prevEl: '.gallery-thumbs .swiper-button-prev',
            },
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 0,
            lazy: true,
            hashNavigation: true,
            thumbs: {
                swiper: galleryThumbs
            },
            navigation: {
                nextEl: '.gallery-top .swiper-button-next',
                prevEl: '.gallery-top .swiper-button-prev',
            },
        });
        var swiper = new Swiper('.product-relate-swiper', {
            slidesPerView: 4,
            loop: false,
            grabCursor: true,
            spaceBetween: 30,
            roundLengths: true,
            slideToClickedSlide: false,
            navigation: {
                nextEl: '.product-relate-swiper .swiper-button-next',
                prevEl: '.product-relate-swiper .swiper-button-prev',
            },
            autoplay: false,
            breakpoints: {
                300: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
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
        $(document).ready(function() {
            $("#lightgallery").lightGallery({
                thumbnail: false
            });
        });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    let selectedColor = null;
    let selectedSize = null;
    let productId = document.querySelector("input[name='product_id']").value;
    let quantityInput = document.getElementById("qty");
    let newPriceDisplay = document.querySelector(".product-price");
    let oldPriceDisplay = document.querySelector(".product-price-old");
    let priceMeta = document.querySelector("meta[itemprop='price']");
    let stockInfo = document.getElementById("stock-info");
    let stockQuantity = 0;

    function showAlert(message) {
        let alertBox = document.getElementById("alert-message");
        let alertText = document.getElementById("alert-text");
        alertText.innerHTML = message;
        alertBox.style.display = "block";
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    }

    function checkAvailability() {
        if (selectedColor && selectedSize) {
            fetch("{{ route('product.checkAvailability') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content,
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    product_id: productId,
                    color_id: selectedColor,
                    size_id: selectedSize,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "error") {
                    newPriceDisplay.innerHTML = `<span style="color: red; font-weight: bold;">${data.message}</span>`;
                    oldPriceDisplay.innerHTML = "";
                    priceMeta.setAttribute("content", "0");
                    stockInfo.innerHTML = "Số lượng: --";
                } else {
                    newPriceDisplay.innerHTML = `<span style="color: green; font-weight: bold;">${data.new_price}</span>`;
                    oldPriceDisplay.innerHTML = data.old_price_raw > data.new_price_raw
                        ? `<del class="price product-price-old">${data.old_price}</del>`
                        : "";
                    priceMeta.setAttribute("content", data.new_price_raw);

                    // Cập nhật số lượng tồn kho của sản phẩm
                    stockQuantity = data.stock_quantity;
                    stockInfo.innerHTML = `Số lượng: ${stockQuantity}`;
                }
            })
            .catch(error => console.error("Lỗi:", error));
        }
    }

    // Xử lý chọn màu sắc
    document.querySelectorAll(".color-option").forEach(colorInput => {
        colorInput.addEventListener("change", function () {
            selectedColor = this.value;
            document.getElementById("selected_color").value = selectedColor;
            checkAvailability();
        });
    });

    // Xử lý chọn size
    document.querySelectorAll(".size-option").forEach(sizeInput => {
        sizeInput.addEventListener("change", function () {
            selectedSize = this.value;
            document.getElementById("selected_size").value = selectedSize;
            checkAvailability();
        });
    });

    // Xử lý tăng số lượng
    document.querySelector(".btn-increase").addEventListener("click", function () {
        if (!selectedColor || !selectedSize) {
            showAlert("Vui lòng chọn màu sắc và size trước khi thay đổi số lượng!");
            return;
        }
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue)) {
            if (currentValue < stockQuantity) {
                quantityInput.value = currentValue + 1;
                document.getElementById("selected_quantity").value = quantityInput.value;
            } else {
                showAlert(`Sản phẩm chỉ còn ${stockQuantity} cái. Vui lòng nhập lại.`);
            }
        }
    });

    // Xử lý giảm số lượng
    document.querySelector(".btn-decrease").addEventListener("click", function () {
        if (!selectedColor || !selectedSize) {
            showAlert("Vui lòng chọn màu sắc và size trước khi thay đổi số lượng!");
            return;
        }
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
            document.getElementById("selected_quantity").value = quantityInput.value;
        }
    });

    // Đảm bảo input không nhập số âm hoặc quá số lượng tồn kho
    quantityInput.addEventListener("change", function () {
        if (!selectedColor || !selectedSize) {
            showAlert("Vui lòng chọn màu sắc và size trước khi thay đổi số lượng!");
            this.value = 1;
            return;
        }
        let currentValue = parseInt(this.value);
        if (isNaN(currentValue) || currentValue < 1) {
            this.value = 1;
        } else if (currentValue > stockQuantity) {
            showAlert(`Sản phẩm chỉ còn ${stockQuantity} cái. Vui lòng nhập lại.`);
            this.value = stockQuantity;
        }
        document.getElementById("selected_quantity").value = this.value;
    });

    // Xử lý khi nhấn "Thêm vào giỏ hàng"
    document.querySelector(".btn-cart").addEventListener("click", function (event) {
        if (!selectedColor || !selectedSize) {
            showAlert("Vui lòng chọn màu sắc và size trước khi thêm vào giỏ hàng!");
            event.preventDefault();
        } else {
            fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content,
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    product_id: productId,
                    color_id: selectedColor,
                    size_id: selectedSize,
                    quantity: quantityInput.value
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    showAlert("🎉 Sản phẩm đã được thêm vào giỏ hàng!");
                } else {
                    showAlert("Không thể thêm sản phẩm vào giỏ hàng, vui lòng thử lại!");
                }
            })
            .catch(error => console.error("Lỗi:", error));
        }
    });

    // Xử lý khi nhấn "Mua ngay"
    document.querySelector(".btn-buy-now").addEventListener("click", function (event) {
        if (!selectedColor || !selectedSize) {
            showAlert("Vui lòng chọn màu sắc và size trước khi mua hàng!");
            event.preventDefault();
        }
    });
});


</script>

    <!-- JavaScript để hiển thị chi tiết tài khoản ngân hàng khi chọn chuyển khoản -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let paymentMethods = document.querySelectorAll("input[name='payment_method']");
        let bankDetails = document.getElementById("bank-details");

        paymentMethods.forEach(method => {
            method.addEventListener("change", function () {
                if (this.value === "bank_transfer") {
                    bankDetails.style.display = "block";
                } else {
                    bankDetails.style.display = "none";
                }
            });
        });
    });
</script>

<script>
    document.getElementById("buy-now-btn").addEventListener("click", function () {
    let productId = document.querySelector("input[name='product_id']").value;
    let productName = document.querySelector(".title-product h1").innerText;
    let selectedColorElement = document.querySelector("input[name='option-0']:checked");
    let selectedSizeElement = document.querySelector("input[name='option-1']:checked");

    let quantity = parseInt(document.getElementById("qty").value);

    let paymentMethod = document.querySelector("input[name='payment_method']:checked")?.value;

    let selectedColor = selectedColorElement ? selectedColorElement.value : null;
    let selectedSize = selectedSizeElement ? selectedSizeElement.value : null;
    let selectedColorId = selectedColorElement?.dataset.id || null;
    let selectedSizeId = selectedSizeElement?.dataset.id || null;


    if (!selectedColor || !selectedSize || !paymentMethod) {
        alert("Vui lòng chọn đầy đủ thông tin!");
        return;
    }

    let priceText = document.querySelector(".price.product-price span").innerText;
    let price = parseFloat(priceText.replace("₫", "").replace(/\./g, "").trim());
    let totalPrice = price * quantity;

    if (paymentMethod === "bank_transfer") {
        // Gửi thanh toán VNPay như cũ
        fetch("/vnpay_payment", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                product_id: productId,
                product_name: productName,
                color: selectedColor,
                size: selectedSize,
                quantity: quantity,
                price: price,
                total_price: totalPrice,
                bank_code: ""
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.code === "00") {
                window.location.href = data.data;
            } else {
                alert("Lỗi khi tạo thanh toán. Vui lòng thử lại!");
            }
        })
        .catch(error => alert("Có lỗi xảy ra, vui lòng thử lại!"));
    } else {

        // ✅ Gọi popup xác nhận đơn hàng trước khi gửi đơn COD
        showOrderSummary(productId, productName, selectedColorId, selectedColor, selectedSizeId, selectedSize, quantity, paymentMethod, price);

       /*     method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                product_id: productId,
                product_name: productName,
                color: selectedColor,
                size: selectedSize,
                quantity: quantity,
                price: price,
                total_price: totalPrice,
                payment_method: paymentMethod
            })
        })
        .then(response => response.json())
        .then(data => alert(data.messae))
        .catch(error => alert("Lỗi khi lưu đơn hàng!"));
*/
    }
});



function showOrderSummary(productId, productName, colorId, color, sizeId, size, quantity, paymentMethod, price) {
    let existingPopup = document.getElementById("checkout-popup");
    let existingOverlay = document.getElementById("checkout-overlay");
    if (existingPopup) existingPopup.remove();
    if (existingOverlay) existingOverlay.remove();

    let overlay = document.createElement("div");
    overlay.id = "checkout-overlay";
    overlay.style.position = "fixed";
    overlay.style.top = "0";
    overlay.style.left = "0";
    overlay.style.width = "100%";
    overlay.style.height = "100%";
    overlay.style.background = "rgba(0, 0, 0, 0.6)";
    overlay.style.zIndex = "999";
    overlay.addEventListener("click", function () {
        document.getElementById("checkout-popup")?.remove();
        overlay.remove();
    });

    let checkoutPopup = document.createElement("div");
    checkoutPopup.id = "checkout-popup";
    checkoutPopup.style.position = "fixed";
    checkoutPopup.style.top = "50%";
    checkoutPopup.style.left = "50%";
    checkoutPopup.style.transform = "translate(-50%, -50%)";
    checkoutPopup.style.background = "#fff";
    checkoutPopup.style.padding = "30px";
    checkoutPopup.style.borderRadius = "10px";
    checkoutPopup.style.boxShadow = "0 0 15px rgba(0,0,0,0.3)";
    checkoutPopup.style.zIndex = "1000";
    checkoutPopup.style.width = "500px";
    checkoutPopup.style.textAlign = "center";
    checkoutPopup.style.fontSize = "16px";

    checkoutPopup.innerHTML = `
        <h2 style="margin-bottom: 15px; color: #333;">Thông tin đơn hàng</h2>
        <p><strong>Sản phẩm:</strong> ${productName}</p>
        <p><strong>Màu sắc:</strong> ${color}</p>
        <p><strong>Size:</strong> ${size}</p>
        <p><strong>Số lượng:</strong> ${quantity}</p>
        <p><strong>Phương thức thanh toán:</strong> ${paymentMethod === "cod" ? "Thanh toán khi nhận hàng (COD)" : "Chuyển khoản ngân hàng"}</p>

        <p><strong>Giá:</strong> <span style="color: red; font-size: 18px;">${price * quantity}đ</span></p>
        <div style="margin-top: 20px; display: flex; justify-content: center;">
            <button id="confirm-order" style="background: #28a745; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Xác nhận đặt hàng</button>

            <button id="close-order" style="background: #dc3545; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-left: 15px;">Đóng</button>
        </div>
    `;

    document.body.appendChild(overlay);
    document.body.appendChild(checkoutPopup);

    document.getElementById("close-order").addEventListener("click", function () {
        checkoutPopup.remove();
        overlay.remove();
    });


    document.getElementById("confirm-order")?.addEventListener("click", function () {
        placeOrder(productId, productName, colorId, sizeId, quantity, price, paymentMethod);
    });
}



function placeOrder(productId, productName, colorId, sizeId, quantity, price, paymentMethod) {

    let csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    if (!csrfToken) {
        alert("Lỗi bảo mật! Không tìm thấy CSRF Token.");
        return;
    }

    let orderData = {
        product_id: parseInt(productId),
        product_name: productName,
        color: String(color),
        size: String(size),
        quantity: parseInt(quantity),
        price: parseFloat(price),
        payment_method: paymentMethod
    };

    fetch("/order/save", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify(orderData)
    })
    .then(response => {
        if (!response.ok) throw new Error("Bad Request");
        return response.json();
    })
    .then(data => {
        if (data.status === "success") {
            alert(`Đơn hàng đã được đặt thành công! Mã đơn hàng: ${data.order_code}`);
            window.location.href = "/orders";
        } else {
            alert("Lỗi: " + data.message);
        }
    })
    .catch(error => alert("Có lỗi xảy ra, vui lòng thử lại!"));
}







</script>


<!-- CSS cho phần thanh toán -->
<style>
    .payment-method {
        border: 1px solid #ddd;
        padding: 15px;
        margin-top: 20px;
        background: #f9f9f9;
        border-radius: 8px;
    }

    .payment-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }

    .payment-option {
        font-weight: bold;
        cursor: pointer;
    }

    .bank-details {
        background: #fff;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        border-left: 4px solid #007bff;
    }
</style>
@endsection
