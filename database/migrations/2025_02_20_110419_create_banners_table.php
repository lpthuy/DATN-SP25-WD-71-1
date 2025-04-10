<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('image'); // Đường dẫn ảnh
            $table->string('title')->nullable(); // Tiêu đề
            $table->text('description')->nullable(); // Mô tả
            $table->string('link')->nullable(); // Link khi click
            $table->integer('position')->default(0); // Vị trí sắp xếp
            $table->boolean('status')->default(1); // 1: hiển thị, 0: ẩn
            $table->timestamps(); // Ngày tạo & cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
