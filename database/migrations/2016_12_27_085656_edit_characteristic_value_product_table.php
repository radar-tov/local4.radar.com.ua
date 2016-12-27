<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCharacteristicValueProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characteristic_value_product', function (Blueprint $table) {
            $table->increments('id')->first();
            $table->integer('characteristic_id')->after('id')->unsigned();


            $table->dropForeign(['characteristic_value_id']);
            $table->dropIndex(['characteristic_value_id']);

            $table->dropForeign(['product_id']);
            $table->dropIndex(['product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characteristic_value_product', function (Blueprint $table) {
            $table->dropColumn('id', 'characteristic_id');
            $table->dropForeign(['characteristic_id']);
            $table->dropForeign(['characteristic_value_id']);
            $table->dropForeign(['product_id']);
        });
    }
}
