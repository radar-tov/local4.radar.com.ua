<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCenagrups2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cenagrups', function (Blueprint $table) {
            $table->integer('brand_id')->after('id');
            $table->double('curs_opt', 8,2)->after('curs');
            $table->double('skidka_opt', 8,2)->after('skidka_montaj');
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
            $table->dropColumn(['brand_id', 'curs_opt', 'skidka_opt']);
        });
    }
}
