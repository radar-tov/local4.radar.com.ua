<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles',function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id',false,true);
			$table->integer('page_id',false,true);
			$table->boolean('show')->defaule(true);
			$table->integer('order',false,true);

			$table->string('meta_title');
			$table->string('meta_description');
			$table->string('meta_keywords');

			$table->string('title');
			$table->string('slug')->unique();
			$table->string('thumbnail');
			$table->text('excerpt');
			$table->text('content');

			$table->timestamp('published_at');
			$table->timestamps();

			// $table->foreign('user_id')->references('users')->on('id');
			// $table->foreign('page_id')->references('pages')->on('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
