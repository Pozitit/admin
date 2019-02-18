<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstTopSecondTopThirdTopToArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles_', function (Blueprint $table) {
            $table->boolean('first')->default(false);
            $table->boolean('second')->default(false);
            $table->boolean('third')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles_', function (Blueprint $table) {
            $table->dropColumn('first');
            $table->dropColumn('second');
            $table->dropColumn('third');
        });
    }
}
