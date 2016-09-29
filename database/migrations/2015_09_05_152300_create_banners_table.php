<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order',$autoincrement=false,$unsigned=true);
            $table->boolean('show')->default(0);

            $table->string('title');
            $table->string('caption');
            $table->string('thumbnail');
            $table->string('link');
            $table->string('alt');
            $table->string('area');

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
        Schema::drop('banners');
    }
}
