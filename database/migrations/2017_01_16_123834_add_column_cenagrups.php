<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCenagrups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cenagrups', function (Blueprint $table) {
            $table->string('pereschet', 50)->after('file');
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
            $table->dropColumn('pereschet');
        });
    }
}
