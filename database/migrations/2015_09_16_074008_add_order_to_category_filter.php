<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderToCategoryFilter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_filter', function(Blueprint $table) {
            $table->integer('order',$autoincrement=false,$unsigned=true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_filter', function(Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
