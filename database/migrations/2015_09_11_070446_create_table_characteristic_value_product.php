<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCharacteristicValueProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_value_product', function(Blueprint $table) {
            $table->integer('characteristic_value_id', $autoincrement = false,$unsigned = true)->index();
            $table->integer('product_id', $autoincrement = false ,$unsigned = true)->index();

            $table->foreign('characteristic_value_id')->references('id')->on('characteristic_values')->onDelete('cascade');
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
        Schema::drop('characteristic_value_product');
    }
}
