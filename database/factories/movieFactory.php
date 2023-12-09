<?php

namespace Database\Factories;

use App\Models\movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movie>
 */
class movieFactory extends Factory
{
    protected $model = movie::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition()
    {
        return [

            'titre' => fake()->sentence(),
            'Auteur' => fake()->name('male'),
            'DateS' => fake()->date(),
            'duree' => fake()->time('H:i:s'),
            'image' => fake()->image('./public/images/', 640, 480,null,false),
            'descri' => fake()->paragraph(),

        ];
    }
}
