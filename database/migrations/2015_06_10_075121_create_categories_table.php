<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories',function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order',false,true);
			$table->integer('deep',false,true);
			$table->integer('parent_id',false,true);
			$table->integer('user_id',false,true);

			$table->boolean('show')->default(0);

			$table->string('title');
			$table->string('slug')->index();
			$table->string('thumbnail');

			$table->string('meta_title');
			$table->text('meta_description');
			$table->text('meta_keywords');

			$table->timestamps();

			//$table->foreign('parent_id')->references('categories')->on('id');
			//$table->foreign('user_id')->references('users')->on('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
