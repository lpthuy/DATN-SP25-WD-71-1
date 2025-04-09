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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name', 60)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('content');
            $table->unsignedTinyInteger('rating')->default(0); // Thêm cột rating (1-5 sao)
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
            
            // Thêm index cho các trường thường dùng để tìm kiếm
            $table->index('product_id');
            $table->index('user_id');
            $table->index('is_visible');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};