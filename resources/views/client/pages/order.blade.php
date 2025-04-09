@extends('client.layouts.main')

@section('title', 'Đơn hàng')

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
                    <strong itemprop="name">Đơn hàng</strong>
                    <meta itemprop="position" content="2" />
                </li>
            </ul>
        </div>
    </section>

    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>
                            Xin chào, <span style="color:#f02757;">{{ Auth::user()->name }}</span>!
                        </p>
                        <p><strong>Số điện thoại:</strong> {{ Auth::user()->phone }}</p>
                        <p><strong>Địa chỉ:</strong> {{ Auth::user()->address }}</p>
                        <ul>
                            <li><a class="title-info" href="{{ route('profile') }}">Thông tin tài khoản</a></li>
                            <li><a class="title-info active" href="javascript:void(0);">Đơn hàng của bạn</a></li>
                            <li><a class="title-info" href="{{ route('changePassword') }}">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-12 col-right-ac">
                    <h1 class="title-head margin-top-0">Đơn hàng của bạn</h1>

                    <div class="my-account">
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive-block tab-all" style="overflow-x:auto;">
                                    <table class="table table-cart table-order" id="my-orders-table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày</th>
                                                <th>Thanh toán</th>
                                                <th>trạng thái thanh toán</th>
                                                <th>Xem chi tiết</th>
                                                <th>Trạng thái</th> <!-- thêm mới -->
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($orders->count() > 0)
                                                @foreach ($orders as $order)
                                                                                                                    <tr>
                                                                                                                        <td>#{{ $order->order_code }}</td>
                                                                                                                        <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                                                                                                        <td>
                                                                                                                            @php
                                                                                                                                $method = strtolower($order->payment_method);
                                                                                                                            @endphp

                                                                                                                            @if($method === 'cod')
                                                                                                                                <span class="badge badge-warning">COD</span>
                                                                                                                            @elseif($method === 'vnpay')
                                                                                                                                <span class="badge badge-success">VNPAY</span>
                                                                                                                            @else
                                                                                                                                <span class="badge badge-secondary">{{ $order->payment_method }}</span>
                                                                                                                            @endif

                                                                                                                        </td>

                                                                                                                        <td>
                                                                                                                            @php
                                                                                                                                $method = strtolower($order->payment_method);
                                                                                                                            @endphp

@if ($order->is_paid)
    <span class="badge badge-success">Thanh toán thành công</span>
@elseif (strtolower($order->payment_method) === 'cod')
    <span class="badge badge-secondary">Chưa thanh toán (COD)</span>
@else
    <span class="badge badge-danger">Thanh toán thất bại</span>
@endif

                                                                                                                        </td>

                                                                                                                        <!-- Dành cho script -->
                                                                                                                        <span id="payment-method-{{ $order->id }}"
                                                                                                                            style="display:none;">{{ strtolower($order->payment_method) }}</span>
                                                                                                                        <span id="is-paid-{{ $order->id }}"
                                                                                                                            style="display:none;">{{ $order->is_paid ? '1' : '0' }}</span>



                                                                                                                        <td>
                                                                                                                            <a href="{{ route('order.detail', ['id' => $order->id]) }}"
                                                                                                                                class="btn btn-sm btn-primary">
                                                                                                                                Xem chi tiết
                                                                                                                            </a>
                                                                                                                        </td>
                                                                                                                        <td class="badge order-status-badge" id="order-status-{{ $order->id }}">
                                                                                                                            @if ($order->status === 'confirming')
                                                                                                                                Đang xác nhận
                                                                                                                            @elseif ($order->status === 'processing')
                                                                                                                                Đang xử lý
                                                                                                                            @elseif ($order->status === 'shipping')
                                                                                                                                Đang giao hàng
                                                                                                                            @elseif ($order->status === 'completed')
                                                                                                                                Đã giao hàng
                                                                                                                            @elseif ($order->status === 'received') {{-- 👈 Thêm dòng này để dịch trạng thái received --}}
                                                                                                                                Đã nhận hàng
                                                                                                                            @elseif ($order->status === 'cancelled')
                                                                                                                                Đã huỷ
                                                                                                                            @elseif ($order->status === 'returning')
                                                                                                                                Đã hoàn hàng
                                                                                                                            @else
                                                                                                                                {{ ucfirst($order->status) }}
                                                                                                                            @endif
                                                                                                                        </td>
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        


                                                                                                                        <td id="order-action-{{ $order->id }}">
                                                                                                                            @php
                                                                                                                                $status = strtolower($order->status);
                                                                                                                                $method = strtolower($order->payment_method);
                                                                                                                                $isFailedPayment = $method === 'vnpay' && !$order->is_paid;
                                                                                                                            @endphp

                                                                                                                            {{-- Nếu thanh toán thất bại (vnpay + chưa thanh toán) thì hiển thị nút
                                                                                                                            thanh toán lại --}}
                                                                                                                            @if($isFailedPayment)
                                                                                                                                <form action="{{ route('checkout.retry', ['order' => $order->id]) }}"
                                                                                                                                    method="GET" style="display:inline-block;">
                                                                                                                                    <button type="submit" class="btn btn-sm btn-warning">
                                                                                                                                        <i class="fas fa-redo-alt"></i> Thanh toán lại
                                                                                                                                    </button>
                                                                                                                                </form>

                                                                                                                                {{-- Huỷ đơn nếu đang xử lý --}}
                                                                                                                            @elseif($status === 'processing')
                                                                                                                                <button class="btn btn-sm btn-danger"
                                                                                                                                    onclick="showCancelModal({{ $order->id }})">
                                                                                                                                    <i class="fas fa-times-circle"></i> Huỷ đơn
                                                                                                                                </button>

                                                                                                                                {{-- Đã nhận hàng --}}
                                                                                                                                @elseif($status === 'completed')
                                                                                                                                <form id="received-form-{{ $order->id }}" action="{{ route('order.received', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return handleReceived(event, {{ $order->id }})">
                                                                                                                                    @csrf
                                                                                                                                    <button type="submit" class="btn btn-sm btn-success">
                                                                                                                                        <i class="fas fa-check-circle"></i> Đã nhận hàng
                                                                                                                                    </button>
                                                                                                                                </form>
                                                                                                                                
                                                                                                                            
                                                                                                                                <form action="{{ route('order.return', $order->id) }}" method="POST" style="display:inline-block; margin-left: 5px;">
                                                                                                                                    @csrf
                                                                                                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                                                                                        <i class="fas fa-undo-alt"></i> Hoàn hàng
                                                                                                                                    </button>
                                                                                                                                </form>
                                                                                                                            

                                                                                                                                {{-- Đã huỷ --}}
                                                                                                                            @elseif($status === 'cancelled')
                                                                                                                                <span class="badge badge-danger">Đã huỷ</span>

                                                                                                                                {{-- Không có hành động --}}
                                                                                                                            @else
                                                                                                                                <span class="text-muted">Không có hành động</span>
                                                                                                                            @endif
                                                                                                                        </td>

                                                                                                                    </tr>
                                                                                @endforeach
                                            @else
                                                <tr>

                                                    <td colspan="7">

                                                        <p class="text-center">Bạn chưa có đơn hàng nào.</p>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div
                                    class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        function handleReceived(event, orderId) {
            event.preventDefault();
    
            const form = document.getElementById(`received-form-${orderId}`);
            const formData = new FormData(form);
    
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token')
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    // ✅ Cập nhật giao diện
                    document.getElementById(`order-action-${orderId}`).innerHTML = `<span class="badge badge-success">Đã nhận</span>`;
                    document.getElementById(`order-status-${orderId}`).innerText = `Đã nhận hàng`;
                } else {
                    alert(data.message || 'Cập nhật thất bại');
                }
            })
            .catch(err => {
                alert('Lỗi khi gửi yêu cầu: ' + err.message);
            });
    
            return false;
        }
    </script>
    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".order-status-badge").forEach(function (badge) {
                const orderId = badge.id.replace("order-status-", "");
                const actionCell = document.getElementById("order-action-" + orderId);
                const paymentMethodElem = document.getElementById("payment-method-" + orderId);
                const isPaidElem = document.getElementById("is-paid-" + orderId);
    
                function renderActionByStatus(statusText) {
                    const status = statusText.trim().toLowerCase();
                    const method = paymentMethodElem ? paymentMethodElem.innerText.trim().toLowerCase() : '';
                    const isPaid = isPaidElem ? isPaidElem.innerText.trim() === '1' : false;
    
                    const isFailedPayment = method === 'vnpay' && !isPaid;
    
                    if (isFailedPayment) {
                        actionCell.innerHTML = `
                            <form action="/cart/recheck" method="POST" style="display: inline-block;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="order_id" value="${orderId}">
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-redo-alt"></i> Thanh toán lại
                                </button>
                            </form>
                        `;
                    } else if (status.includes("đang xử lý")) {
                        actionCell.innerHTML = `
                            <button class="btn btn-sm btn-danger" onclick="showCancelModal(${orderId})">
                                <i class="fas fa-times-circle"></i> Huỷ đơn
                            </button>
                        `;
                    } else if (status.includes("giao thành công") || status.includes("đã giao") || status.includes("hoàn tất")) {
                        // Nếu đơn đã giao → kiểm tra xem đã qua 1 phút chưa
                        const deliveredAt = document.getElementById(`delivered-at-${orderId}`);
                        const isReceived = badge.innerText.trim().toLowerCase().includes('nhận hàng');

                        if (deliveredAt && !isReceived) {
                            const deliveredTime = new Date(deliveredAt.innerText.trim());
                            const now = new Date();
                            const diffInMinutes = (now - deliveredTime) / 60000;

                            if (diffInMinutes >= 1) {
                                // ✅ Quá 1 phút rồi → chuyển UI thành Đã nhận
                                badge.innerText = 'Đã nhận hàng';
                                badge.classList.add('badge-success');
                                actionCell.innerHTML = `<span class="badge badge-success">Đã nhận</span>`;
                                return;
                            }
                        }

                        // Nếu chưa quá 1 phút thì vẫn hiển thị 2 nút
                        actionCell.innerHTML = `
                            <form action="/don-hang/${orderId}/da-nhan" method="POST" style="display:inline-block;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check-circle"></i> Đã nhận hàng
                                </button>
                            </form>

                            <button class="btn btn-sm btn-outline-danger" style="margin-left: 5px;" onclick="showReturnModal(${orderId})">
                                <i class="fas fa-undo-alt"></i> Hoàn hàng
                            </button>
                        `;

                    } else if (status.includes("hủy") || status.includes("đã huỷ")) {
                        actionCell.innerHTML = `<span class="badge badge-danger">Đã huỷ</span>`;
                    } else {
                        actionCell.innerHTML = `<span class="text-muted">Không có hành động</span>`;
                    }
                }
    
                renderActionByStatus(badge.innerText);
    
                setInterval(() => {
                    renderActionByStatus(badge.innerText);
                }, 2000);
            });
        });
    
        // Hàm hiển thị form hoàn hàng
        function showReturnModal(orderId) {
            document.getElementById("returnOrderId").value = orderId;
            document.getElementById("returnForm").action = `/don-hang/${orderId}/hoan-hang`;
            document.getElementById("returnModal").style.display = "flex";
        }
    
        function closeReturnModal() {
            document.getElementById("returnModal").style.display = "none";
            document.getElementById("returnForm").reset();
        }
    </script>
    
    



    <!-- Modal hoàn hàng -->
<div id="returnModal" class="cancel-modal" style="display: none;">
    <div class="cancel-modal-content">
        <h5 class="cancel-title">📦 Lý do hoàn hàng</h5>
        <form id="returnForm" enctype="multipart/form-data" method="POST" action="{{ route('order.return', ['id' => 0]) }}">
            @csrf
            <input type="hidden" name="order_id" id="returnOrderId">

            <div class="form-group">
                <label for="return_reason">Lý do:</label>
                <textarea class="form-control" name="return_reason" id="return_reason" rows="3" required></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="return_media">Ảnh/Video hàng lỗi:</label>
                <input type="file" class="form-control" name="return_media" accept="image/*,video/*" required>
            </div>

            <div class="cancel-actions">
                <button type="submit" class="btn btn-danger">Gửi hoàn hàng</button>
                <button type="button" onclick="closeReturnModal()" class="btn btn-secondary">Đóng</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showReturnModal(orderId) {
    document.getElementById('returnOrderId').value = orderId;
    const form = document.getElementById('returnForm');
    form.action = `/don-hang/${orderId}/hoan-hang`;
    document.getElementById('returnModal').style.display = 'block';
}

function closeReturnModal() {
    document.getElementById('returnModal').style.display = 'none';
    document.getElementById('return_reason').value = '';
}

</script>
    

    <!-- Modal chọn lý do hủy -->
    <div id="cancelModal" class="cancel-modal" style="display: none;">
        <div class="cancel-modal-content">
            <h5 class="cancel-title">📝 Lý do hủy đơn hàng</h5>
            <form id="cancelForm">
                <div class="cancel-reason">
                    <label><input type="radio" name="reason" value="Tôi không còn nhu cầu"> Tôi không còn nhu cầu</label>
                    <label><input type="radio" name="reason" value="Tôi đặt nhầm"> Tôi đặt nhầm</label>
                    <label><input type="radio" name="reason" value="Thời gian giao hàng quá lâu"> Thời gian giao hàng quá
                        lâu</label>
                    <label><input type="radio" name="reason" value="Lý do khác" id="other-reason-radio"> Lý do khác</label>
                    <textarea id="customReason" placeholder="Nhập lý do khác..." rows="3" style="display: none;"></textarea>
                </div>

                <input type="hidden" id="cancelOrderId">

                <div class="cancel-actions">
                    <button type="button" onclick="submitCancelReason()" class="btn btn-danger">Xác nhận</button>
                    <button type="button" onclick="closeCancelModal()" class="btn btn-secondary">Đóng</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const badges = document.querySelectorAll('.order-status-badge');

            setInterval(() => {
                badges.forEach(badge => {
                    const id = badge.id.replace('order-status-', '');

                    fetch(`/api/order-status/${id}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.status) {
                                let text = '';
                                let classList = 'badge order-status-badge ';

                                switch (data.status) {
                                    case 'processing':
                                        text = 'Đang xử lý';
                                        classList += 'badge-info';
                                        break;
                                    case 'shipping':
                                        text = 'Đang giao hàng';
                                        classList += 'badge-primary';
                                        break;
                                    case 'completed':
                                        text = 'Đã giao hàng';
                                        classList += 'badge-success';
                                        break;
                                    case 'cancelled':
                                        text = 'Đã hủy';
                                        classList += 'badge-danger';
                                        break;
                                    default:
                                        text = data.status;
                                        classList += 'badge-secondary';
                                }

                                badge.innerText = text;
                                badge.className = classList;
                            }
                        });
                });
            }, 3000); // Cập nhật mỗi 3 giây
        });
    </script>



    <script>
        function showCancelModal(orderId) {
            document.getElementById('cancelOrderId').value = orderId;
            document.getElementById('cancelModal').style.display = 'block';
        }

        function closeCancelModal() {
            document.getElementById('cancelModal').style.display = 'none';
            document.querySelectorAll('input[name="reason"]').forEach(el => el.checked = false);
            document.getElementById('customReason').value = '';
            document.getElementById('customReason').style.display = 'none';
        }

        document.querySelectorAll('input[name="reason"]').forEach(radio => {
            radio.addEventListener('change', function () {
                const custom = document.getElementById('customReason');
                if (this.value === 'Lý do khác') {
                    custom.style.display = 'block';
                } else {
                    custom.style.display = 'none';
                }
            });
        });

        function submitCancelReason() {
            const orderId = document.getElementById('cancelOrderId').value;
            const selected = document.querySelector('input[name="reason"]:checked');
            let reason = '';

            if (!selected) {
                alert('Vui lòng chọn lý do hủy đơn!');
                return;
            }

            if (selected.value === 'Lý do khác') {
                reason = document.getElementById('customReason').value.trim();
                if (!reason) {
                    alert('Vui lòng nhập lý do cụ thể!');
                    return;
                }
            } else {
                reason = selected.value;
            }

            fetch("{{ route('order.cancel') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    order_id: orderId,
                    cancel_reason: reason
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message || 'Huỷ thất bại!');
                    }
                })
                .catch(error => {
                    alert('Có lỗi xảy ra khi gửi yêu cầu.');
                    console.error(error);
                });

        }
    </script>





    <style>
        .btn-cancel-order {
            background-color: #ffe6e6;
            color: #d9534f;
            border: 1px solid #d9534f;
            padding: 5px 12px;
            font-size: 14px;
            border-radius: 4px;
            transition: 0.3s ease;
            font-weight: bold;
        }

        .btn-cancel-order i {
            margin-right: 5px;
        }

        .btn-cancel-order:hover {
            background-color: #d9534f;
            color: white;
            box-shadow: 0 0 5px rgba(217, 83, 79, 0.5);
        }
    </style>

    <style>
        .cancel-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.4);
            /* nền mờ tối */
            z-index: 9999;
        }

        .cancel-modal-content {
            background-color: #fff;
            padding: 24px 28px;
            border-radius: 12px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            animation: slideIn .3s ease;
        }

        .cancel-title {
            margin-bottom: 16px;
            font-size: 18px;
            font-weight: 600;
        }

        .cancel-reason label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .cancel-reason textarea {
            margin-top: 8px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: vertical;
        }

        .cancel-actions {
            text-align: right;
            margin-top: 16px;
        }

        .cancel-actions .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
            margin-left: 10px;
        }

        .cancel-actions .btn-danger {
            background-color: #e3342f;
            color: white;
            border: none;
        }

        .cancel-actions .btn-secondary {
            background-color: #f1f1f1;
            color: #333;
            border: 1px solid #ccc;
        }

        /* Hiệu ứng */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>


@endsection