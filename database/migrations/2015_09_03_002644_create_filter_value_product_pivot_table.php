<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterValueProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_value_product', function(Blueprint $table) {
            $table->integer('filter_value_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
//            $table->foreign('filter_value_id')->references('id')->on('filter_values')->onDelete('cascade');
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filter_value_product');
    }
}
