<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name')->unique();
            $table->string('color_code', 7)->unique(); // Ví dụ: #FF0000
        });
    }

    public function down() {
        Schema::dropIfExists('colors');
    }
};
