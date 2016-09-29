<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToCharacteristics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characteristics', function(Blueprint $table){
	        $table->integer('category_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('characteristics', function(Blueprint $table){
		    $table->dropColumn('category_id');
	    });
    }
}
