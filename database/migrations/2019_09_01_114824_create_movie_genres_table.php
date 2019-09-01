<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('movie_id')->unsigned()->index();
            $table->integer('genre_id')->unsigned()->index();
            $table->integer('sort')->default(500);

            $table->timestamps();

            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_genres');
    }
}
