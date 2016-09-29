<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id',false,true);
			$table->integer('label_id',false,true);
			$table->integer('user_id',false,true);
			$table->boolean('draft')->default(0);
			$table->boolean('active')->default(1);

			$table->float('rating',8,2);

			$table->string('article')->index();
			$table->decimal('price',8,2)->index();
			$table->tinyInteger('discount',false,true);
			$table->string('slug')->index();
			$table->string('title')->index();
			$table->string('thumbnail');
			$table->text('excerpt');
			$table->text('body');

			$table->text('meta_title');
			$table->text('meta_description');
			$table->text('meta_keywords');

			$table->timestamps();
			$table->softDeletes();

			// $table->foreign('user_id')->references('id')->on('users');
			// $table->foreign('category_id')->references('id')->on('categories');
			// $table->foreign('labels_id')->references('id')->on('labels');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
