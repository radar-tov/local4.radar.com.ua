<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNpCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('np_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ref');
            $table->string('Description');
            $table->string('DescriptionRu');
            $table->integer('Delivery1');
            $table->integer('Delivery2');
            $table->integer('Delivery3');
            $table->integer('Delivery4');
            $table->integer('Delivery5');
            $table->integer('Delivery6');
            $table->integer('Delivery7');
            $table->string('Area');
            $table->string('PreventEntryNewStreetsUser')->nullable();
            $table->string('Conglomerates')->nullable();
            $table->integer('CityID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('np_cities');
    }
}
