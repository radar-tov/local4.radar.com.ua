<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('country_id');
            $table->integer('area_id');
            $table->integer('city_id');
            $table->integer('otdel_id');
            $table->integer('rating');
            $table->integer('publish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['country_id', 'area_id', 'city_id', 'rating', 'otdel_id', 'publish']);
        });
    }
}
