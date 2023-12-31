<?php

namespace Database\Factories;

use App\Models\Salle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory
{
    protected $model=Salle::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "nom"=>fake()->title('Male'),
            'nbr_place'=>rand(50,100)
        ];
    }
}
