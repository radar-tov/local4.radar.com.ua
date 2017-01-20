<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCenagrups1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cenagrups', function (Blueprint $table) {
            $table->float('skidka_montaj')->after('nacenka');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cenagrups', function (Blueprint $table) {
            $table->dropColumn('skidka_montaj');
        });
    }
}
