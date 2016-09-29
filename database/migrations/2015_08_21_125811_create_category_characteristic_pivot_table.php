<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCharacteristicPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_characteristic', function(Blueprint $table) {
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('characteristic_id')->unsigned()->index();

            //$table->foreign('characteristic_id')->references('id')->on('characteristics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_characteristic');
    }
}
