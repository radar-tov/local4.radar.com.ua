<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('feedback_email');
			$table->string('contact_email');
			$table->string('address');
			$table->string('currency');

			$table->string('header_phone1');
			$table->string('header_phone2');
			$table->string('footer_phone1');
			$table->string('footer_phone2');
			$table->string('footer_phone3');

			$table->string('instagram');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('google');
			$table->string('vkontakte');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
