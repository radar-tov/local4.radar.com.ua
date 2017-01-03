<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProductsCena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function ($table) {
            $table->decimal('base_price', 8,2)->after('price');
            $table->integer('out_price')->after('base_price');
            $table->integer('cenagrup_id')->after('out_price');
            $table->decimal('nacenka')->after('discount');
            $table->string('name', 255)->after('title');
            $table->text('url_1')->after('clone_of');
            $table->text('url_2')->after('url_1');
            $table->text('url_3')->after('url_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function ($table) {
            $table->dropColumn(['base_price', 'out_price', 'cenagrup_id', 'nacenka', 'name', 'url_1', 'url_2', 'url_3']);
        });
    }
}
