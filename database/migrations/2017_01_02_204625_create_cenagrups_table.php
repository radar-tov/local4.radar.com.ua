<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenagrupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cenagrups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('valuta', 60);
            $table->float('curs');
            $table->float('skidka');
            $table->float('nacenka');
            $table->text('coment');
            $table->text('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cenagrups');
    }
}
