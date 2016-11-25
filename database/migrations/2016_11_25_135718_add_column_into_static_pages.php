<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIntoStaticPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('static_pages', function ($table) {
            $table->string('changefreq')->default('weekly')->after('apdated_at')->nullable();
            $table->string('priority')->default('0.5')->after('changefreq')->nullable();
            $table->boolean('sitemap')->default(true)->after('priority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn(['changefreq', 'priority', 'sitemap']);
    }
}
