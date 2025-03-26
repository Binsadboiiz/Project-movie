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
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->string('title'); // Tên phim
            $table->string('subtitle')->nullable(); // Phụ đề (có thể null)
            $table->string('image'); // Đường dẫn ảnh
            $table->text('description')->nullable(); // Mô tả phim
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
