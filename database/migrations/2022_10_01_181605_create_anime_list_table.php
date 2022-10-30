<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type');
            $table->string('title');
            $table->string('title_orig');
            $table->string('other_title');
            $table->integer('year');
            $table->integer('last_season');
            $table->integer('last_episode');
            $table->integer('episodes_count');
            $table->integer('kinopoisk_id');
            $table->integer('imdb_id');
            $table->string('worldart_link');
            $table->integer('shikimori_id');
            $table->string('quality');
            $table->boolean('camrip');
            $table->string('blocked_countries');
            $table->string('blocked_seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_list');
    }
}
