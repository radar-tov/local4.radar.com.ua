<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStockPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('stock_id')->unsigned()->index();
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->primary(['product_id', 'stock_id']);

            $table->boolean('is_main');
            $table->decimal('stock_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_stock');
    }
}
