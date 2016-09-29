<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id',$autoincrement = false, $unsigned = true);
            $table->integer('product_id',$autoincrement = false, $unsigned = true);
            $table->float('rating',8,2);
            $table->integer('likes',$autoincrement = false, $unsigned = false);
            $table->text('body');
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
