<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_movies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();
            $table->integer('movie_id')->unsigned()->index();

            $table->integer('sort')->default(500);
            $table->boolean('watched')->default(false);
            $table->timestamp('watched_at')->nullable();
            $table->integer('rating')->nullable();
            $table->text('review')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('restrict');

            $table->index(['user_id', 'watched']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_movies');
    }
}
