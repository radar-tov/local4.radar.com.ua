<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
            $table->unique('phone');

            $table->string('organization')->after('remember_token');
            $table->text('comments')->after('organization');
            $table->string('phone_all')->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_phone_unique');
            $table->unique('email');

            $table->dropColumn('organization', 'comments', 'phone_all');
        });
    }
}
