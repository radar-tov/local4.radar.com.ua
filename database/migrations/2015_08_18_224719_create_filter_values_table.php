<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_values', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('filter_id',false,true);
            $table->string('value');
            $table->integer('order',$autoIncrement = false,$unsigned = true);
            $table->timestamps();

            // $table->foreign('parameter_id')->references('id')->on('parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filter_values');
    }
}
