<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoweredByToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function(Blueprint $table) {
           $table->bigInteger('powered_by',$autoincrement = false, $unsigned=true)->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function(Blueprint $table) {
            $table->dropColumn('powered_by');
        });
    }
}
