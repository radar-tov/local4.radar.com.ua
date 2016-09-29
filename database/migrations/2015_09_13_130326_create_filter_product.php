<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_product', function(Blueprint $table) {
            $table->integer('filter_id',$autoincrement = false, $unsigned = true);
            $table->integer('product_id',$autoincrement = false, $unsigned = true);
            $table->integer('filter_value_id',$autoincrement = false, $unsigned = true);


             $table->foreign('filter_id')->references('id')->on('filters');
             $table->foreign('product_id')->references('id')->on('products');
             $table->foreign('filter_value_id')->references('id')->on('filter_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filter_product');
    }
}
