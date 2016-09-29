<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages',function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id',false,true);
			$table->boolean('show')->defaule(true);
			$table->integer('order',false,true);

			$table->string('title');
			$table->string('slug')->unique();
			$table->string('meta_title');
			$table->string('meta_description');
			$table->string('meta_keywords');
			$table->timestamps();

			// $table->foreign('user_id')->references('users')->on('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
