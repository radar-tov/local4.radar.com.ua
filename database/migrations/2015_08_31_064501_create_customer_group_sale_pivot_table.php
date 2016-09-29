<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerGroupSalePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_group_sale', function(Blueprint $table) {
            $table->integer('customer_group_id')->unsigned()->index();
            $table->foreign('customer_group_id')->references('id')->on('customer_groups')->onDelete('cascade');
            $table->integer('sale_id')->unsigned()->index();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_group_sale');
    }
}
