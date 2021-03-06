<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('changefreq')->default('weekly');
            $table->string('priority')->default('0.1')->after('changefreq');
            $table->boolean('sitemap')->default(true)->after('priority');
            $table->boolean('yandex')->default(true)->after('sitemap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['changefreq', 'priority', 'sitemap', 'yandex']);
        });
    }
}
