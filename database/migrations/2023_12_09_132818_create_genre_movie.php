<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_movie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("genre_id");
            $table->unsignedBigInteger("movie_id");

            $table->foreign("genre_id")->references('id')->on("genres");
            $table->foreign("movie_id")->references('id')->on("movies");






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_movie');
    }
};
