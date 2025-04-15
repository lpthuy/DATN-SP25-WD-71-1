@extends('client.layouts.main')

@section('title', 'Xác nhận đơn hàng')

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
            margin: 20px auto;
            padding: 20px;
        }

        .checkout-wrapper {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .checkout-left,
        .checkout-right {
            flex: 1;
            min-width: 300px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        /* Thông tin người mua */
        .buyer-info {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .buyer-info select,
        .buyer-info input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        /* Phần sản phẩm và thanh toán */
        .order-details {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .product-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .product-item img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .product-info {
            flex: 1;
        }

        .product-info p {
            margin: 0;
            font-size: 0.9rem;
        }

        .product-price {
            font-weight: 600;
            color: #333;
        }

        /* Mã giảm giá */
        .coupon-section {
            margin: 20px 0;
        }

        .coupon-section input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .coupon-section button {
            width: 28%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .coupon-section button:hover {
            background: #0056b3;
        }

        /* Phương thức thanh toán */
        .payment-methods {
            margin: 20px 0;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: border 0.3s ease;
        }

        .payment-option:hover {
            border-color: #007bff;
        }

        .payment-option input {
            margin-right: 10px;
        }

        .payment-option img {
            width: 30px;
            margin-left: 10px;
        }

        /* Tổng tiền */
        .order-summary {
            margin: 20px 0;
        }

        .order-summary p {
            display: flex;
            justify-content: space-between;
            font-size: 1rem;
            margin: 5px 0;
        }

        .order-summary .total {
            font-weight: 600;
            font-size: 1.2rem;
            color: #e74c3c;
        }

        /* Nút đặt hàng */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .action-buttons a,
        .action-buttons button {
            flex: 1;
            padding: 12px;
            text-align: center;
            border-radius: 5px;
            font-size: 1rem;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .action-buttons a {
            background: #f5f5f5;
            color: #007bff;
            border: 1px solid #ddd;
        }

        .action-buttons a:hover {
            background: #e9ecef;
        }

        .action-buttons button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .action-buttons button:hover {
            background: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .checkout-wrapper {
                flex-direction: column;
            }

            .coupon-section input,
            .coupon-section button {
                width: 100%;
                margin: 5px 0;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>

    <div class="container">
        <div class="checkout-wrapper">
            <!-- Bên trái: Thông tin người mua -->
            <div class="checkout-left">
                <div class="section-title">Thông tin nhận hàng</div>
                <div class="buyer-info">
                    <input type="email" value="{{ $user->email ?? 'Chưa có' }}" placeholder="Email" readonly>
                    <input type="text" value="{{ $user->name ?? 'Chưa đăng nhập' }}" placeholder="Họ và tên" readonly>
                    <input type="text" value="{{ $user->phone ?? 'Chưa có' }}" placeholder="Số điện thoại" readonly>
                    <input type="text" value="{{ $user->address ?? 'Chưa có' }}" placeholder="Địa chỉ" readonly>
                </div>
            </div>

            <!-- Bên phải: Sản phẩm và thanh toán -->
            <div class="checkout-right">
                <div class="section-title">Đơn hàng</div>
                <div class="order-details">
                    <p style="background: #e7f3ff; padding: 10px; border-radius: 5px;">
                        Đang bắt đầu thông tin giao hàng
                    </p>

                    <!-- Sản phẩm -->
                    @foreach ($checkoutItems as $index => $item)
                                        @php
                                            $variant = \App\Models\ProductVariant::where('product_id', $item['product_id'])
                                                ->whereHas('color', fn($q) => $q->where('color_name', $item['color']))
                                                ->whereHas('size', fn($q) => $q->where('size_name', $item['size']))
                                                ->first();
                                            $maxQty = $variant ? $variant->stock_quantity : 1;
                                        @endphp

                                        <div class="product-item" id="checkout-item-{{ $index }}">
                                            <img src="{{ asset('storage/' . explode(',', $item['image'])[0]) }}" alt="{{ $item['name'] }}">
                                            <div class="product-info">
                                                <p>{{ $item['name'] }}</p>
                                                <p>{{ $item['color'] }} / {{ $item['size'] }}</p>

                                                <div style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                                                    <input type="number" class="checkout-qty" data-index="{{ $index }}"
                                                        value="{{ $item['quantity'] }}" min="1" max="{{ $maxQty }}"
                                                        style="width: 60px; padding: 5px; border: 1px solid #ddd; border-radius: 5px;">
                                                    <span class="text-danger error-msg" id="error-qty-{{ $index }}"
                                                        style="font-size: 0.85rem;"></span>
                                                </div>
                                            </div>
                                            <div class="product-price" id="price-{{ $index }}">
                                                {{ number_format($item['total_price'], 0, ',', '.') }}₫
                                            </div>
                                            <!-- Nút xoá sản phẩm -->


                                        </div>
                    @endforeach


                    <!-- Mã giảm giá -->
                    <div class="coupon-section">
                        <input type="text" id="coupon-code" placeholder="Nhập mã giảm giá">
                        <button onclick="applyCoupon()">Áp dụng</button>
                    </div>
                    <div id="coupon-message" class="text-danger mt-1"></div>

                    <!-- Phương thức thanh toán -->
                    <div class="section-title">Thanh toán</div>
                    <div class="payment-methods">
                        <label class="payment-option">
                            <input type="radio" name="payment_method" id="vnpay" value="vnpay" checked>
                            Thanh toán qua VNPAY-QR
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp1v7T287-ikP1m7dEUbs2n1SbbLEqkMd1ZA&s"
                                alt="VNPay">
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" id="cod" value="cod">
                            Thanh toán khi nhận hàng (COD)
                            <img src="https://media.istockphoto.com/id/912819716/vi/vec-to/bi%E1%BB%83u-t%C6%B0%E1%BB%A3ng-th%C6%B0%C6%A1ng-m%E1%BA%A1i-%C4%91i%E1%BB%87n-t%E1%BB%AD-thi%E1%BA%BFt-k%E1%BA%BF-money-flat.jpg?s=612x612&w=0&k=20&c=jobrYns8VnIxx-nGTq6-GZli7xR8as4ibCWvgKTS2XM="
                                alt="COD">
                        </label>
                    </div>

                    <!-- Tổng tiền -->
                    <!-- Tổng tiền -->
                    <p>Tạm tính <span id="temp-total">{{ number_format($total, 0, ',', '.') }}₫</span></p>
                    <p>Phí vận chuyển
                        <span>{{ $shippingFee == 0 ? 'Miễn phí' : number_format($shippingFee, 0, ',', '.') . '₫' }}</span>
                    </p>
                    <p class="total">Tổng cộng
                        <span id="total-price">
                            {{ number_format($total + $shippingFee, 0, ',', '.') }}₫
                        </span>
                    </p>




                    <!-- Nút đặt hàng -->
                    <div class="action-buttons">
                        <a href="#">Quay về giỏ hàng</a>
                        <button id="buy-now-btn">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.getElementById("buy-now-btn").addEventListener("click", function () {
    let paymentMethod = document.querySelector("input[name='payment_method']:checked")?.value;

    if (!paymentMethod) {
        alert("Vui lòng chọn phương thức thanh toán!");
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const totalText = document.getElementById("total-price").innerText.replace(/[^\d]/g, "");
    const totalPrice = parseInt(totalText);

    const promoCode = sessionStorage.getItem('promo_code') || null;
    const promoDiscount = parseInt(sessionStorage.getItem('promo_discount')) || 0;

    if (paymentMethod === "vnpay") {
        console.log("👉 Đang gửi yêu cầu thanh toán VNPay...");
        fetch("{{ route('vnpay.payment') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({
                price: totalPrice,
                bank_code: "",
                promo_code: promoCode,
                promo_discount: promoDiscount
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log("✅ Phản hồi từ server:", data);
            if (data.code === "00" && data.data) {
                window.location.href = data.data; // VNPAY sẽ tự redirect về sau
            } else {
                alert("Không thể tạo thanh toán. Hãy thử lại!");
            }
        })
        .catch(err => {
            console.error("❌ Lỗi fetch:", err);
            alert("Lỗi khi gửi yêu cầu đến VNPay!");
        });
    } else {
        console.log("👉 Gửi yêu cầu thanh toán COD...");
        fetch("{{ route('order.cod') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
            console.log("✅ Phản hồi COD:", data);
            if (data.status === "success") {
                const msg = encodeURIComponent(data.message + " Mã đơn hàng: " + data.order_code);
                window.location.href = data.redirect + '?success=' + msg;
            } else {
                alert(data.message || "Lỗi khi lưu đơn hàng COD.");
            }
        })
        .catch(err => {
            console.error("❌ Lỗi gửi COD:", err);
            alert("Không thể gửi đơn hàng COD!");
        });
    }
});

    
        function applyCoupon() {
            const code = document.getElementById('coupon-code').value.trim();
            const messageEl = document.getElementById('coupon-message');
            let total = {{ $total }};
            let shipping = {{ $shippingFee }};
    
            fetch('{{ route('apply.coupon') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ code: code, total: total })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const discountedTotal = total - data.discount;
                    const grandTotal = discountedTotal + shipping;
    
                    // 👉 Lưu mã vào sessionStorage và session server
                    sessionStorage.setItem('promo_code', code);
                    sessionStorage.setItem('promo_discount', data.discount);
    
                    fetch('{{ route('save.promo.code') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            code: code,
                            discount: data.discount
                        })
                    });
    
                    // 👉 Cập nhật giao diện
                    document.getElementById('total-price').innerText = new Intl.NumberFormat('vi-VN').format(grandTotal) + '₫';
                    messageEl.innerHTML = `<span class="text-success">${data.message} - Giảm ${data.discount.toLocaleString('vi-VN')}₫</span>`;
                } else {
                    messageEl.innerText = data.message;
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                messageEl.innerText = 'Lỗi khi áp dụng mã!';
            });
        }
    </script>
    

    <script>
        const shippingFee = {{ $shippingFee }};

document.querySelectorAll('.checkout-qty').forEach(input => {
    input.addEventListener('change', function () {
        const index = this.dataset.index;
        const newQty = parseInt(this.value);
        const errorMsg = document.getElementById(`error-qty-${index}`);

        if (isNaN(newQty) || newQty < 1) {
            errorMsg.innerText = "Số lượng không hợp lệ.";
            this.value = 1;
            return;
        }

        fetch('{{ route("checkout.updateQty") }}', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ index, quantity: newQty })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                errorMsg.innerText = "";

                document.getElementById(`price-${index}`).innerText = data.item_total + '₫';

                // ✅ Cập nhật Tạm tính
                document.getElementById("temp-total").innerText = new Intl.NumberFormat('vi-VN').format(data.total_raw) + '₫';

                // ✅ Cập nhật Tổng cộng
                const totalWithShipping = data.total_raw + shippingFee;
                document.getElementById("total-price").innerText = new Intl.NumberFormat('vi-VN').format(totalWithShipping) + '₫';
            } else {
                errorMsg.innerText = data.message || "Số lượng vượt quá tồn kho.";
                this.value = data.current_qty;
            }
        })
        .catch(err => {
            console.error("Lỗi cập nhật:", err);
            errorMsg.innerText = "Lỗi khi gửi yêu cầu!";
        });
    });
});

    </script>
    

   
<style>

    /* Ẩn mũi tên tăng/giảm trong input number trên tất cả trình duyệt */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield; /* Firefox */
}

</style>

@endsection