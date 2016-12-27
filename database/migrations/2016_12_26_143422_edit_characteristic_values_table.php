<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCharacteristicValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characteristic_values', function ($table) {
            $table->dropIndex(['value']);
            $table->dropIndex('category_id');
            $table->dropColumn('product_id');
            $table->integer('order')->after('value');

            $table->foreign('characteristic_id')->references('id')->on('characteristics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characteristic_values', function ($table) {
            $table->index('value');
            $table->index('category_id');
            $table->integer('product_id');
            $table->dropColumn('order');
        });
    }
}
