<?php

use App\Http\Controllers\Admin\BannerController;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderSuccessMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\client\HomeController;



use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\RevenueStatisticsController;


use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\PaymentMethodController;

use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PostController;

Auth::routes();


Route::get('/api/order-status/{id}', function ($id) {
    $order = Order::find($id);

    if (!$order) {
        return response()->json(['error' => 'Không tìm thấy đơn hàng'], 404);
    }

    return response()->json([
        'status' => $order->status
    ]);
});

Route::post('/apply-coupon', [PromotionController::class, 'apply'])->name('apply.coupon');
Route::post('/save-promo-code', [PromotionController::class, 'saveCode'])->name('save.promo.code');


Route::get('danh-muc/{slug}', [App\Http\Controllers\Client\ProductController::class, 'category'])->name('category.products');

Route::get('/checkout/retry/{order}', [CheckoutController::class, 'retry'])->name('checkout.retry');

// Route (web.php)
Route::post('/don-hang/{id}/hoan-hang', [OrderController::class, 'markAsReturned'])->name('order.return');

Route::post('/order/{id}/received', [OrderController::class, 'received'])->name('order.received');

Route::delete('/admin/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');




// quản lý khuyến mãi
Route::resource('promotions', PromotionController::class);
Route::post('/promotions/{id}/toggle', [PromotionController::class, 'toggleStatus'])->name('promotions.toggle');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('about');

Route::get('/san-pham', [HomeController::class, 'product'])->name('product');
// Route::get('/chi-tiet-san-pham', [HomeController::class, 'productDetail'])->name('productDetail');
Route::get('/chi-tiet-san-pham/{id}', [HomeController::class, 'productDetail'])->name('productDetail');
//thu muc , sp lq toi thu mucmuc
Route::get('/san-pham/{id}', [HomeController::class, 'productDetail'])
    ->name('product.detail');
Route::get('/danh-muc', [HomeController::class, 'productByCategory'])
    ->name('productbycategory');
//in ra toan bo spsp
Route::get('/products', [HomeController::class, 'allProducts'])->name('products.all');

Route::post('/admin/products/{id}/toggle-active', [ProductController::class, 'toggleActive'])->name('products.toggleActive');

// sp lien quan 
Route::get('/category/{categoryId}/products', [HomeController::class, 'categoryProducts']);

Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');


Route::get('/tin-tuc', [HomeController::class, 'post'])->name('post');
Route::get('post-detail/{post}', [HomeController::class, 'postShow'])->name('showpost');

Route::get('/lien-he', [HomeController::class, 'contact'])->name('contact');
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('search');
Route::get('/yeu-thich', [HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/gio-hang', [HomeController::class, 'cart'])->name('cart');
Route::post('/gio-hang/cap-nhat', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/checkout/update-qty', [CheckoutController::class, 'updateQty'])->name('checkout.updateQty');


Route::get('/kiem-tra-don-hang', [HomeController::class, 'checkOrder'])->name('checkOrder');
Route::get('/chinh-sach-giao-hang', [HomeController::class, 'chinhSachGiaoHang'])->name('chinhSachGiaoHang');

Route::get('/dang-nhap', [HomeController::class, 'login'])->name('login');
Route::post('/dang-nhap', [HomeController::class, 'doLogin'])->name('doLogin');

Route::get('/dang-ky', [HomeController::class, 'register'])->name('register');
Route::post('/dang-ky', [HomeController::class, 'doRegister'])->name('doRegister');

Route::get('/doi-mat-khau', [HomeController::class, 'changePassword'])->name('changePassword');
Route::post('/doi-mat-khau', [HomeController::class, 'doChangePassword'])->name('doChangePassword');



Route::post('/logout', function (Request $request) {
    session()->forget('cart'); // ✅ Xoá session giỏ hàng
    Auth::logout();            // Đăng xuất
    return redirect()->route('home'); // Chuyển về trang chủ hoặc tuỳ bạn
})->name('logout');


Route::get('/tai-khoan', [HomeController::class, 'profile'])->name('profile');
Route::get('/don-hang', [HomeController::class, 'order'])->name('order');
Route::get('/dia-chi', [HomeController::class, 'address'])->name('address');






Route::get('/tai-khoan/chinh-sua', [HomeController::class, 'editProfile'])->name('editProfile');
Route::post('/tai-khoan/chinh-sua', [HomeController::class, 'updateProfile'])->name('updateProfile');


Route::get('/gio-hang', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/gio-hang/them', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/gio-hang/xoa', [CartController::class, 'removeItem'])->name('cart.remove');
Route::post('/gio-hang/cap-nhat', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/count', [CartController::class, 'countCart'])->name('cart.count');



Route::post('/check-availability', [HomeController::class, 'checkAvailability'])->name('product.checkAvailability');
Route::get('/check-availability', [HomeController::class, 'checkAvailability']); // Thêm GET để kiểm tra nhanh



Route::get('/order/check-payment-status', [OrderController::class, 'checkPaymentStatus']);
Route::post('/order-cod', [OrderController::class, 'store'])->name('order.cod');







// Hiển thị danh sách đơn hàng
Route::get('/don-hang', [OrderController::class, 'index'])->name('order.index');
Route::get('/so-dia-chi', [HomeController::class, 'addressBook'])->name('addressBook');


Route::middleware(['auth'])->group(function () {
    Route::post('/order/save', [OrderController::class, 'store']);
});
Route::get('/orders', [OrderController::class, 'index'])->name('order');

Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.detail');

Route::post('/order/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancel');



Route::get('/check-login-status', function () {
    return response()->json(['isAuthenticated' => Auth::check()]);
});







Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment'])->name('vnpay.payment');
Route::get('/vnpay_return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/thanh-toan', [CheckoutController::class, 'show'])->name('checkout.show');
// routes/web.php
Route::post('/cart/recheck', [CartController::class, 'recheckCart'])->name('cart.recheck');


Route::get('/check-login-status', function () {
    return response()->json(['isAuthenticated' => Auth::check()]);
});





Route::match(['get', 'post'], '/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');



Route::get('/admin/orders/{id}/pdf', [OrderController::class, 'exportPDF'])->name('orders.exportPDF');


// web.php
Route::post('/don-hang/{id}/da-nhan', [OrderController::class, 'markAsReceived'])->name('order.received');
Route::post('/don-hang/{id}/hoan-hang', [OrderController::class, 'markAsReturned'])->name('order.return');




// Chỉ Admin mới có quyền vào Dashboard

// Nhóm các route của Admin vào cùng 1 middleware
// Nhóm các route của Admin vào cùng 1 middleware

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('banners', BannerController::class)->names('admin.banners');
    Route::resource('categories', CategoryController::class);
    Route::get('categories/toggle/{category}', [CategoryController::class, 'toggle'])->name('categories.toggle');


    // Quản lý danh mục sản phẩm

    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); //sửa sản phẩm
    // Quản lý sản phẩm
    Route::resource('products', ProductController::class);
    // Quản lý kích thước sản phẩm (Size)
    Route::resource('sizes', SizeController::class);
    // Quản lý màu sắc sản phẩm (Color)
    Route::resource('colors', ColorController::class);
    // Quản lý biến thể sản phẩm (Product Variants)
    Route::resource('products_variants', ProductVariantController::class);
    // Quản lý hình ảnh sản phẩm (Product Images)
    Route::resource('products_images', ProductImageController::class);
    //quản lý banner

    Route::resource('posts', PostController::class);


    //battat bai vietviet
    Route::post('posts/{post}/toggle-status', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');
    //show bai viet clientclient




    //quan ly binh lua

    Route::resource('comments', AdminCommentController::class)->only(['index', 'destroy']);
    Route::patch('comments/{comment}/toggle', [AdminCommentController::class, 'toggleVisibility'])->name('comments.toggle');
    Route::get('/admin/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    //quan lý đơn hàng
    Route::get('orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
    Route::post('orders/{id}/update-status', [OrdersController::class, 'updateStatus'])->name('orders.updateStatus');
    // quản lý khuyến mãi
    Route::resource('promotions', PromotionController::class);
    // quan ly thong ke
    Route::get('revenue', [RevenueStatisticsController::class, 'statistics'])->name('admin.revenue.statistics');
});
