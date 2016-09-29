<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('characteristic_id')->unsigned();
	        $table->integer('product_id')->unsigned();
	        $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('characteristic_values');
    }
}
