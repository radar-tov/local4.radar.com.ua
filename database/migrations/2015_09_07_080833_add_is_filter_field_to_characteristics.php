<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFilterFieldToCharacteristics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characteristics', function (Blueprint $table) {
            $table->boolean('is_filter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characteristics', function (Blueprint $table) {
            $table->dropColumn('is_filter');
        });
    }
}
