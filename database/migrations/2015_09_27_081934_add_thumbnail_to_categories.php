<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories',function(Blueprint $table){
            $table->string('thumb_link');
            $table->string('thumb_alt');
            $table->string('thumb_desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories',function(Blueprint $table){
            $table->dropColumn(['thumb_alt','thumb_link','thumb_desc']);
        });
    }
}
