<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('product_id')->unsigned();
	        $table->string('title');
	        $table->string('article');
	        $table->integer('qty');
	        $table->integer('price');
	        $table->integer('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordered_products');
    }
}
