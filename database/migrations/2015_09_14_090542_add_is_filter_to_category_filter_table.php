<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFilterToCategoryFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_filter', function (Blueprint $table) {
            $table->boolean('is_filter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_filter', function (Blueprint $table) {
	        $table->dropColumn('is_filter');
        });
    }
}
