<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeDeleteToFilterProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filter_product', function (Blueprint $table) {
	        $table->dropForeign('filter_product_product_id_foreign');
	        $table->dropForeign('filter_product_filter_id_foreign');
	        $table->dropForeign('filter_product_filter_value_id_foreign');

	        $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
	        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
	        $table->foreign('filter_value_id')->references('id')->on('filter_values')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filter_product', function (Blueprint $table) {
            //
        });
    }
}
