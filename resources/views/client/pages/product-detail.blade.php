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
                <a itemprop="item" href="{{ route('home') }}" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                    <meta itemprop="position" content="1" />
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{ route('productbycategory', $category->id) }}" title="{{ $category->name }}">
                    <span itemprop="name">{{ $category->name }}</span>
                    <meta itemprop="position" content="2" />
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <strong>
                    <span itemprop="name">{{ $product->name }}</span>
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
                            <div class="swiper-container gallery-top ">
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

                                    RAINBOW STORE

                                </span>
                            </span>
                            <span class="line">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="mb-break">
                                <span class="stock-brand-title">Tình trạng:</span>


                                <span class="a-stock" id="stock-status" style="font-weight: bold;">
                                    @if(isset($defaultVariant) && $defaultVariant->stock_quantity > 0)
                                        <span style="color: green;">Còn hàng</span>
                                    @else
                                        <span style="color: red;">Hết hàng</span>
                                    @endif
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
                                        <li>Đồng giá Ship toàn quốc 20.000đ</li>
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
                                        <p><strong>🚚 Miễn phí giao hàng toàn quốc cho đơn hàng từ 300.000đ!</strong></p>

                                        <p><em><strong>HÃY ĐẾN&nbsp;</strong><b>RAINBOW STORE</b><strong>&nbsp;ĐỂ
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
                                        <p><b>RAINBOW STORE&nbsp;</b>- Thương hiệu thời trang của người trẻ hiện
                                            đại! Ra đời vào năm 2024, Rainbow - store&nbsp;luôn nỗ lực với sứ mệnh tạo
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
        ->where('status', 'đã nhận hàng')
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
                        <span class="rating-value">{{ $productRating['average'] }}/5⭐</span>
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
                    <p class="alert alert-success">cảm ơn bạn đã đánh giá trải nghiệm sản phẩm của.</p>
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
                        @foreach($relatedProducts as $product)
    <div class="swiper-slide">
        <div class="item_product_main" data-id="{{ $product->id }}">
            <form action="{{ route('cart.add', $product->id) }}" method="post" class="variants product-action wishItem" enctype="multipart/form-data">
                @csrf
                <div class="product-thumbnail">
                    <a class="image_thumb" href="{{ route('product.detail', $product->id) }}" title="{{ $product->name }}">
                        <div class="product-image">
                            @php
                                $images = explode(',', $product->image); 
                                $firstImage = isset($images[0]) ? trim($images[0]) : null;
                            @endphp
                            @if($firstImage)
                                <img class="lazy img-responsive" width="300" height="300" src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}" />
                            @else
                                <img class="lazy img-responsive" width="300" height="300" src="{{ asset('images/no-image.png') }}" alt="Không có ảnh" />
                            @endif
                        </div>
                    </a>
                    <div class="action-cart">
                        {{-- <a href="javascript:void(0)" class="action btn-compare js-btn-wishlist setWishlist btn-views" 
                           data-wish="{{ $product->slug }}" title="Thêm vào yêu thích"></a> --}}
                        <a title="Xem nhanh" href="{{ route('product.detail', $product->id) }}" class="quick-view btn-views">🔍</a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="lofi-product">
                        <div class="product-type">
                            {{ $product->category->name }}
                        </div>
                    </div>

                    <h3 class="product-name">
                        <a href="{{ route('product.detail', $product->id) }}" title="{{ $product->name }}">
                            {{ $product->name }}
                        </a>
                    </h3>

                    <div class="bottom-action">
                        <div class="price-box">
                            @if($product->discount_price && $product->discount_price < $product->price)
                                <span class="price-old" style="color: #999; text-decoration: line-through; font-size: 14px;">
                                    {{ number_format($product->price, 0, ',', '.') }}₫
                                </span>
                                <span class="price-new" style="color: #e60000; font-weight: bold; font-size: 16px;">
                                    {{ number_format($product->discount_price, 0, ',', '.') }}₫
                                </span>
                            @else
                                @php $variant = $product->variants->first(); @endphp
                                @if($variant && $variant->discount_price && $variant->discount_price < $variant->price)
                                    <span class="price-old" style="color: #999; text-decoration: line-through; font-size: 14px;">
                                        {{ number_format($variant->price, 0, ',', '.') }}₫
                                    </span>
                                    <span class="price-new" style="color: #e60000; font-weight: bold; font-size: 16px;">
                                        {{ number_format($variant->discount_price, 0, ',', '.') }}₫
                                    </span>
                                @elseif($variant)
                                    <span class="price-new" style="color: #333; font-weight: bold; font-size: 16px;">
                                        {{ number_format($variant->price, 0, ',', '.') }}₫
                                    </span>
                                @else
                                    <span class="price-new" style="color: #333; font-weight: bold; font-size: 16px;">
                                        {{ number_format($product->price, 0, ',', '.') }}₫
                                    </span>
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
    } else if (stockQuantity === 0) {
        showAlert("❌ Sản phẩm này đã hết hàng, không thể thêm vào giỏ hàng!");
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
