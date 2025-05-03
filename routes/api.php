<?php

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


// routes/api.php
use App\Http\Controllers\Api\ShipperAuthController;
use App\Http\Controllers\Api\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/vietqr/webhook', function (Request $request) {
    Log::info('Nhận webhook từ VietQR:', $request->all());

    $orderCode = $request->input('order_code');
    $status = $request->input('status');

    $order = Order::where('order_code', $orderCode)->first();

    if ($order) {
        if ($status === 'success') {
            $order->update(['payment_status' => 'completed']);
            return response()->json(['message' => 'Thanh toán cập nhật thành công']);
        } else {
            return response()->json(['message' => 'Thanh toán thất bại'], 400);
        }
    }

    return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
});


Route::prefix('shipper')->group(function () {
    Route::post('/register', [ShipperAuthController::class, 'register']);
    Route::post('/login', [ShipperAuthController::class, 'login']);
});


Route::middleware(['auth:sanctum', 'throttle:none'])->prefix('shipper')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/completed-orders', [OrderController::class, 'completed']);
});


Route::middleware(['auth:sanctum', 'shipper'])->group(function () {
    Route::put('/shipper/orders/{id}/status', [OrderController::class, 'updateStatus']);
    Route::put('/shipper/orders/{id}/paid', [OrderController::class, 'markAsPaid']);
    Route::get('/shipper/orders/{id}', [OrderController::class, 'show']);
});

Route::middleware(['auth:sanctum', 'shipper'])->get('/shipper/orders/code/{order_code}', [OrderController::class, 'getOrderByCode']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']); // Đơn hàng cần giao
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus']); // Cập nhật trạng thái
    Route::post('/logout', [ShipperAuthController::class, 'logout']);
});


