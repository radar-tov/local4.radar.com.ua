<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategoryCharacteristic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_characteristic', function ($table) {
            $table->integer('order')->after('characteristic_id');
            $table->boolean('show')->after('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_characteristic', function ($table) {
            $table->dropColumn('order', 'show');
        });
    }
}
