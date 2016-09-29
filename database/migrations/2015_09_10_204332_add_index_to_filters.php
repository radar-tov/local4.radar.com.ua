<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filters',function(Blueprint $table){
            $table->dropUnique('filters_slug_unique');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filters',function(Blueprint $table){
            $table->dropIndex('filters_slug_index');
        });

    }
}
