<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\movie;
use App\Models\Salle;
use App\Models\Horaire;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Horaire::factory()->count(3)->for(movie::factory()->count(3))
       ->create();
    }
}
