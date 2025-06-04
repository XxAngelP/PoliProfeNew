<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => fake()->numberBetween(3,200),
            'profesores_id' => fake()->numberBetween(1,200),
            'materia_id' => fake()->numberBetween(1,20),
            'r_dm' => fake()->numberBetween(1,5),
            'r_ce' => fake()->numberBetween(1,5),
            'r_mia' => fake()->numberBetween(1,5),
            'r_oc' => fake()->numberBetween(1,5),
            'r_ru' => fake()->numberBetween(1,5),
            'r_drd' => fake()->numberBetween(1,5),
            'r_ejr' => fake()->numberBetween(1,5),
            'r_rte' => fake()->numberBetween(1,5),
            'r_ra' => fake()->numberBetween(1,5),
            'r_com' => fake()->text(256),
            'estatus' => fake()->numberBetween(0,2,3),
            'cm' => fake()->optional()->text(80),
        ];
    }
}
