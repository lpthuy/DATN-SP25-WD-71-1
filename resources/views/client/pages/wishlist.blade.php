@extends('client.layouts.main')

@section('title', 'Danh sách yêu thích')

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
                <strong itemprop="name">Yêu thích</strong>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</section>

<section class="main-wishlist-page main-container col1-layout">
    <div class="main container wishlistpcstyle">
        <div class="wrap_background_aside margin-bottom-40">
            <div class="header-wishlist">
                <div class="heading-home">
                    <div class="site-animation">
                        <h1>Danh sách yêu thích của bạn</h1>
                    </div>
                </div>
            </div>
            <div class="wishlist-page d-xl-block d-none">
                <div class="drawer__inner">
                    <div class="WishlistPageContainer">
                        <div class="row">
                            <!-- Cột thông tin sản phẩm -->
                            <div class="col-md-12">
                                <table class="wishlist-table">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all-wishlist"></th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Màu sắc</th>
                                            <th>Size</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        use App\Models\Product;
                                        use App\Models\ProductVariant;

                                        $wishlistItems = session('wishlist', []);
                                        $validWishlistItems = [];

                                        foreach ($wishlistItems as $key => $item) {
                                        $productExists = Product::find($item['product_id']);
                                        $variantExists = ProductVariant::find($item['variant_id']);
                                        if ($productExists && $variantExists) {
                                        $validWishlistItems[$key] = $item;
                                        }
                                        }
                                        @endphp

                                        @if(count($validWishlistItems) > 0)
                                        @foreach($validWishlistItems as $wishlistKey => $item)
                                        <tr id="wishlist-item-{{ $wishlistKey }}">
                                            <td>
                                                <input type="checkbox" class="wishlist-checkbox" data-id="{{ $wishlistKey }}">
                                            </td>
                                            <td>
                                                @php
                                                $image = isset($item['image']) ? explode(',', $item['image'])[0] : 'default.png';
                                                @endphp
                                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $item['name'] }}"
                                                    class="wishlist-image">
                                            </td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['color'] }}</td>
                                            <td>{{ $item['size'] }}</td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}₫</td>
                                            <td class="wishlist-total">
                                                {{ number_format($item['price'], 0, ',', '.') }}₫
                                            </td>
                                            <td>
                                                <button class="btn btn-danger remove-wishlist-item"
                                                    data-id="{{ $wishlistKey }}">Xóa</button>
                                                <button class="btn btn-primary add-to-cart"
                                                    data-id="{{ $wishlistKey }}">Thêm vào giỏ</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="8" class="text-center">Danh sách yêu thích của bạn hiện tại chưa có sản phẩm nào.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let checkboxes = document.querySelectorAll(".wishlist-checkbox");
        let selectAllCheckbox = document.getElementById("select-all-wishlist");

        // Chọn tất cả
        selectAllCheckbox.addEventListener("change", function() {
            let isChecked = this.checked;
            checkboxes.forEach(checkbox => checkbox.checked = isChecked);
        });

        // Từng checkbox thay đổi
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                if (!this.checked) selectAllCheckbox.checked = false;
            });
        });

        // Xoá sản phẩm yêu thích
        document.querySelectorAll(".remove-wishlist-item").forEach(button => {
            button.addEventListener("click", function() {
                let wishlistKey = this.getAttribute("data-id");
                fetch("/yeu-thich/xoa", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({
                            wishlistKey
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector(`#wishlist-item-${wishlistKey}`).remove();
                        }
                    });
            });
        });

        // Thêm vào giỏ từ yêu thích
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function() {
                let wishlistKey = this.getAttribute("data-id");
                fetch("/yeu-thich/them-vao-gio", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({
                            wishlistKey
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert("Đã thêm vào giỏ hàng!");
                        }
                    });
            });
        });
    });
</script>
@endsection