<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbPhoneAddressIntoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table) {
//            $table->integer('role_id',$autoincrement=false,$unsigned=true)->after('active');
            $table->integer('permissions',$autoincrement=false,$unsigned=false)->after('role_id');

            $table->string('thumbnail');
            $table->string('address');
            $table->string('phone');
            $table->string('city');
            $table->string('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table) {
            $table->dropColumn(['thumbnail','address','phone','permissions','city','country']);
        });
    }
}
