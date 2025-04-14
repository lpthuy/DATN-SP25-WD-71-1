<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductVariant;


class PaymentController extends Controller
{
    public function vnpay_payment(Request $request)
{
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('vnpay.return');
    $vnp_TmnCode = "2KVYC04T";
    $vnp_HashSecret = "FXNGJH0W969WQELS747QRGBUIAUFRLRN";

    $checkoutItems = session('checkout_items', []);
    $promoCode = session('promo_code'); 
    $promoDiscount = session('promo_discount', 0); 

    $totalProduct = 0;
    foreach ($checkoutItems as $item) {
        $totalProduct += $item['price'] * $item['quantity'];
    }

    $shippingFee = $totalProduct >= 300000 ? 0 : 20000;

    $totalAmount = max(0, $totalProduct - $promoDiscount + $shippingFee);

    // Luôn luôn tạo mới mã giao dịch khi gọi VNPay
    $vnp_TxnRef = time() . Str::random(4); // đảm bảo mã là duy nhất
    $vnp_OrderInfo = "Thanh toán đơn hàng - " . $vnp_TxnRef;
    $vnp_Amount = $totalAmount * 100;
    $vnp_Locale = "VN";
    $vnp_BankCode = $request->input('bank_code', "NCB");
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    session([
        'order_code' => $vnp_TxnRef,
        'checkout_items' => $checkoutItems,
        'shipping_fee' => $shippingFee,
        'promo_discount' => $promoDiscount,
        'promo_code' => $promoCode,
        'total_amount' => $totalAmount,
        'retry_payment' => session('retry_payment', false),
        'retry_order_id' => session('retry_order_id'),
    ]);

    $inputData = [
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => "billpayment",
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    ];

    if (!empty($vnp_BankCode)) {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        $hashdata .= ($hashdata ? '&' : '') . urlencode($key) . "=" . urlencode($value);
        $query .= urlencode($key) . "=" . urlencode($value) . "&";
    }

    $vnp_Url .= "?" . $query;
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= "vnp_SecureHash=" . $vnpSecureHash;

    return response()->json([
        'code' => '00',
        'message' => 'success',
        'data' => $vnp_Url,
        'transaction_code' => $vnp_TxnRef
    ]);
}



public function vnpayReturn(Request $request)
{
    $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    $isPaid = ($vnp_ResponseCode == "00") ? 1 : 0;

    Log::info("VNPay Callback - Session Data: ", session()->all());

    $checkoutItems = session('checkout_items', []);
    $orderCode = session('order_code');
    $userId = auth()->id();
    $shippingFee = session('shipping_fee', 0);
    $promoCode = session('promo_code', null);
    $promoDiscount = session('promo_discount', 0);
    $totalAmount = session('total_amount');

    if (!$checkoutItems || !$userId) {
        return redirect()->route('order')->with('error', "Dữ liệu không hợp lệ hoặc hết hạn.");
    }

    if (session('retry_payment')) {
        $order = Order::find(session('retry_order_id'));

        if (!$order) {
            return redirect()->route('order')->with('error', "Không tìm thấy đơn hàng cũ.");
        }

        $order->update([
            'payment_method' => 'VNPAY',
            'is_paid' => $isPaid,
            'total_price' => $totalAmount,
            'shipping_fee' => $shippingFee,
            'promotion_code' => $promoCode,
            'discount' => $promoDiscount,
            'status' => $isPaid ? 'processing' : $order->status,
        ]);
    } else {
        $order = Order::create([
            'order_code' => $orderCode,
            'user_id' => $userId,
            'payment_method' => 'VNPAY',
            'status' => 'processing',
            'is_paid' => $isPaid,
            'total_price' => $totalAmount,
            'shipping_fee' => $shippingFee,
            'promotion_code' => $promoCode,
            'discount' => $promoDiscount,
        ]);

        foreach ($checkoutItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'] ?? null,
                'product_name' => $item['name'] ?? '',
                'color' => $item['color'] ?? '',
                'size' => $item['size'] ?? '',
                'quantity' => $item['quantity'] ?? 1,
                'price' => $item['price'] ?? 0,
            ]);
        }
    }

    session()->forget([
        'checkout_items',
        'order_code',
        'shipping_fee',
        'promo_code',
        'promo_discount',
        'total_amount',
        'retry_payment',
        'retry_order_id'
    ]);

    if ($isPaid) {
        return redirect()->route('order')->with('success', "Thanh toán thành công! Mã đơn hàng: $order->order_code");
    } else {
        return redirect()->route('order')->with('error', "Thanh toán thất bại hoặc bị huỷ từ VNPay.");
    }
}


}
