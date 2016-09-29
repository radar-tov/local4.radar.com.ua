<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFilterPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_filter', function(Blueprint $table) {
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('filter_id')->unsigned()->index();
            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_filter');
    }
}
