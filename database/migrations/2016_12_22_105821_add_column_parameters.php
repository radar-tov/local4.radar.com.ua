<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameters', function ($table) {
            $table->integer('category_id')->after('slug');
            $table->integer('brand_id')->after('category_id');
            $table->integer('default_value')->after('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameters', function ($table) {
            $table->dropColumn('category_id');
            $table->dropColumn('brand_id');
            $table->dropColumn('default_value');
        });
    }
}
