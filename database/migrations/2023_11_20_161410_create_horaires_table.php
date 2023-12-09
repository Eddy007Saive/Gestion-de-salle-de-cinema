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
        Schema::create('horaires', function (Blueprint $table) {
            $table->id();
            $table->date("DateD");
            $table->time("heureD");
            $table->integer("placeDispo");
            $table->timestamps();


            // Création clées étrangere film
            $table->foreignId("movie_id")->references("id")->on("movies")->onDelete("cascade")->onUpdate("cascade");
            
            // Création clées étrangere salle
            $table->foreignId("salle_id")->references("id")->on("salles")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horaires');
    }
};
