<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSlugFromMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('image');
        });
    }
}
