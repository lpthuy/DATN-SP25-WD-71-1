<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng
            $table->string('method_name');  // Tên phương thức thanh toán (ví dụ: "Chuyển khoản ngân hàng", "Tiền mặt khi nhận hàng")
            $table->text('description')->nullable();  // Mô tả phương thức thanh toán
            $table->string('image_path')->nullable();  // Cột lưu trữ đường dẫn hình ảnh (nullable để không bắt buộc)
            $table->timestamps();  // Cột created_at và updated_at tự động
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
