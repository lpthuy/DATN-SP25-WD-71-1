@extends('client.layouts.main')

@section('title', 'Giỏ hàng')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    body {
        background: #f5f5f5;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Breadcrumb */
    .bread-crumb {
        background: #fff;
        padding: 10px 0;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .breadcrumb {
        list-style: none;
        display: flex;
        gap: 10px;
    }

    .breadcrumb li {
        font-size: 0.9rem;
    }

    .breadcrumb a {
        color: #666;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        color: #dc3545;
    }

    /* Main Cart Section */
    .main-cart-page {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .header-cart h1 {
        font-size: 2rem;
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Cart Table */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .cart-table th,
    .cart-table td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .cart-table th {
        background: #dc3545;
        /* Màu đỏ cho header */
        color: white;
        font-weight: 600;
    }

    .cart-table tbody tr {
        border-bottom: 1px solid #eee;
        transition: background 0.3s ease;
    }

    .cart-table tbody tr:hover {
        background: #f9f9f9;
    }

    .cart-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    /* Quantity Controls */
    .quantity-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .btn-quantity {
        width: 30px;
        height: 30px;
        border: none;
        background: #ddd;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-quantity:hover {
        background: #ccc;
    }

    .quantity-input {
        width: 40px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }

    /* Remove Button */
    .remove-cart-item {
        background: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .remove-cart-item:hover {
        background: #c82333;
    }

    /* Fixed Total Container */
    .fixed-total-container {
        position: sticky;
        bottom: 0;
        background: #fff;
        padding: 15px;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px 10px 0 0;
        z-index: 1000;
    }

    .total-price-container {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
    }

    #total-price {
        color: #dc3545;
        /* Màu đỏ cho tổng tiền */
    }

    .btn-checkout {
        background: #dc3545;
        /* Màu đỏ cho nút thanh toán */
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-checkout:hover {
        background: #c82333;
    }

    /* Empty Cart Message */
    .text-center {
        padding: 20px;
        font-size: 1.1rem;
        color: #666;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .cart-table th,
        .cart-table td {
            font-size: 0.9rem;
            padding: 10px;
        }

        .cart-image {
            width: 40px;
            height: 40px;
        }

        .fixed-total-container {
            flex-direction: column;
            gap: 10px;
        }

        .btn-checkout {
            width: 100%;
        }
    }
</style>

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
                <strong itemprop="name">Giỏ hàng</strong>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</section>

<section class="main-cart-page main-container col1-layout">
    <div class="main container cartpcstyle">
        <div class="wrap_background_aside margin-bottom-40">
            <div class="header-cart">
                <div class="heading-home">
                    <div class="site-animation">
                        <h1>Giỏ hàng của bạn</h1>
                    </div>
                </div>
            </div>
            <div class="cart-page d-xl-block d-none">
                <div class="drawer__inner">
                    <div class="CartPageContainer">
                        <div class="row">
                            <!-- Cột thông tin sản phẩm -->
                            <div class="col-md-12">
                                <table class="cart-table">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Màu sắc</th>
                                            <th>Size</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        use App\Models\Product;
                                        use App\Models\ProductVariant;

                                        $cartItems = session('cart', []);
                                        $validCartItems = [];

                                        foreach ($cartItems as $key => $item) {
                                        $productExists = Product::find($item['product_id']);
                                        $variantExists = ProductVariant::find($item['variant_id']);
                                        if ($productExists && $variantExists) {
                                        $validCartItems[$key] = $item;
                                        }
                                        }
                                        @endphp

                                        @if(count($validCartItems) > 0)
                                        @foreach($validCartItems as $cartKey => $item)
                                        <tr id="cart-item-{{ $cartKey }}">
                                            <td>
                                                <input type="checkbox" class="cart-checkbox" data-id="{{ $cartKey }}">
                                            </td>
                                            <td>
                                                @php
                                                $image = isset($item['image']) ? explode(',', $item['image'])[0] : 'default.png';
                                                @endphp
                                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $item['name'] }}" class="cart-image">
                                            </td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['color'] }}</td>
                                            <td>{{ $item['size'] }}</td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}₫</td>
                                            <td>
                                                <div class="quantity-container">
                                                    <button class="btn-quantity btn-decrease" data-id="{{ $cartKey }}">-</button>
                                                    <input type="number" value="{{ $item['quantity'] }}" min="1" class="quantity-input" data-id="{{ $cartKey }}">
                                                    <button class="btn-quantity btn-increase" data-id="{{ $cartKey }}">+</button>
                                                </div>
                                            </td>
                                            <td class="cart-total">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}₫</td>
                                            <td>
                                                <button class="btn btn-danger remove-cart-item" data-id="{{ $cartKey }}">Xóa</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="9" class="text-center">Giỏ hàng của bạn hiện tại chưa có sản phẩm nào.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Thanh toán cố định dưới cùng -->
                        <div class="fixed-total-container">
                            <div class="total-price-container">
                                Tổng tiền: <span id="total-price">0₫</span>
                            </div>
                            <form id="checkout-form" action="{{ route('checkout.show') }}" method="GET">
                                @csrf
                                <input type="hidden" name="selected_products" id="selected-products">
                                <button type="submit" class="btn btn-checkout">Thanh toán</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let checkboxes = document.querySelectorAll(".cart-checkbox");
        let checkoutForm = document.getElementById("checkout-form");
        let selectedProductsInput = document.getElementById("selected-products");

        checkoutForm.addEventListener("submit", function(event) {
            let selectedProducts = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    let cartKey = checkbox.getAttribute("data-id");
                    let quantity = document.querySelector(`.quantity-input[data-id='${cartKey}']`).value;
                    selectedProducts.push({
                        cartKey,
                        quantity
                    });
                }
            });

            if (selectedProducts.length === 0) {
                alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán!");
                event.preventDefault();
                return;
            }

            selectedProductsInput.value = JSON.stringify(selectedProducts);
        });
    });

    // Xử lý xóa và cập nhật số lượng
    document.addEventListener("DOMContentLoaded", function() {
        let checkboxes = document.querySelectorAll(".cart-checkbox");
        let selectAllCheckbox = document.getElementById("select-all");
        let totalPriceElement = document.getElementById("total-price");

        function restoreCheckedItems() {
            let checkedItems = JSON.parse(localStorage.getItem("checkedItems")) || {};
            checkboxes.forEach(checkbox => {
                let cartKey = checkbox.getAttribute("data-id");
                if (checkedItems[cartKey]) {
                    checkbox.checked = true;
                }
            });
            updateTotalPrice();
        }

        function updateTotalPrice() {
            let total = 0;
            let checkedItems = {};
            checkboxes.forEach(checkbox => {
                let cartKey = checkbox.getAttribute("data-id");
                if (checkbox.checked) {
                    let itemTotal = parseFloat(document.querySelector(`#cart-item-${cartKey} .cart-total`).innerText.replace(/\D/g, ''));
                    total += itemTotal;
                    checkedItems[cartKey] = true;
                } else {
                    checkedItems[cartKey] = false;
                }
            });
            localStorage.setItem("checkedItems", JSON.stringify(checkedItems));
            totalPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(total) + "₫";
        }

        selectAllCheckbox.addEventListener("change", function() {
            let isChecked = this.checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            updateTotalPrice();
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                updateTotalPrice();
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                }
            });
        });

        document.querySelectorAll(".remove-cart-item").forEach(button => {
            button.addEventListener("click", function() {
                let cartKey = this.getAttribute("data-id");
                fetch("/gio-hang/xoa", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({
                            cartKey: cartKey
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector(`#cart-item-${cartKey}`).remove();
                            updateTotalPrice();
                        }
                    })
                    .catch(error => console.error("Lỗi:", error));
            });
        });

        document.querySelectorAll(".btn-quantity").forEach(button => {
            button.addEventListener("click", function() {
                let cartKey = this.getAttribute("data-id");
                let quantityInput = document.querySelector(`.quantity-input[data-id='${cartKey}']`);
                let newQuantity = parseInt(quantityInput.value);

                if (this.classList.contains("btn-increase")) {
                    newQuantity++;
                } else if (this.classList.contains("btn-decrease") && newQuantity > 1) {
                    newQuantity--;
                }

                quantityInput.value = newQuantity;

                fetch("/gio-hang/cap-nhat", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({
                            cartKey: cartKey,
                            quantity: newQuantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector(`#cart-item-${cartKey} .cart-total`).innerText = data.item_total + "₫";
                            updateTotalPrice();
                        }
                    })
                    .catch(error => console.error("Lỗi:", error));
            });
        });

        restoreCheckedItems();
    });

    // Kiểm tra giỏ hàng định kỳ
    
</script>
@endsection