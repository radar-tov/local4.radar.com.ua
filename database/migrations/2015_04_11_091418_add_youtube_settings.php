<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYoutubeSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings',function(Blueprint $table) {
			$table->string('youtube');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings',function(Blueprint $table) {
			$table->dropColumn('youtube');
		});
	}

}
