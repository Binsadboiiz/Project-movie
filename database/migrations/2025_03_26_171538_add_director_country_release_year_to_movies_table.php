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
        Schema::table('movies', function (Blueprint $table) {
            $table->string('director')->nullable()->after('description'); // Cột đạo diễn
            $table->string('country')->nullable()->after('director'); // Cột quốc gia
            $table->year('release_year')->nullable()->after('country'); // Cột năm sản xuất
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn(['director', 'country', 'release_year']);
        });
    }
};
