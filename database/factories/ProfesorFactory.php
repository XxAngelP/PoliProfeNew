<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'academias_id' => fake()->numberBetween(1,10),
            'nombre_completo' => fake()->name(),
            'fecha_nacimiento' => fake()->dateTimeBetween('1950-01-01', '1990-12-31'),
        ];
    }
}
