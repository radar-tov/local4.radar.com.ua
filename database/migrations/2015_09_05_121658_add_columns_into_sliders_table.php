<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsIntoSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders',function(Blueprint $table){
            $table->string('alt');
            $table->integer('order');
            $table->string('subtitle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sliders',function(Blueprint $table){
            $table->dropColumn(['alt','order']);
        });
    }
}
