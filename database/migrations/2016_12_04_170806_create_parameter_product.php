<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParameterProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_product', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parameter_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('parameter_value_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parameter_product');
    }
}
