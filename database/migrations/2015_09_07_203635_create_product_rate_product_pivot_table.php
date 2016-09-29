<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRateProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rate_product', function(Blueprint $table) {
            $table->integer('product_rate_id')->unsigned()->index();
            $table->foreign('product_rate_id')->references('id')->on('product_rates')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_rate_product');
    }
}
