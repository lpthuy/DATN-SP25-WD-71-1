<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        // Đảm bảo bảng sizes và colors tồn tại trước khi tạo product_variants
        if (!Schema::hasTable('sizes') || !Schema::hasTable('colors')) {
            throw new Exception("Bảng 'sizes' hoặc 'colors' chưa tồn tại. Hãy chạy migration cho chúng trước.");
        }

        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');
            $table->integer('stock_quantity')->default(0);
            $table->decimal('price', 10, 2);
            $table->string('image_url')->nullable();
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('product_variants');
    }
};
