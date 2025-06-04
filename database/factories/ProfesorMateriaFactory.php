<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfesorMateria>
 */
class ProfesorMateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profesores_id' => fake()->numberBetween(1,100),
            'materias_id' => fake()->numberBetween(1,20),
        ];
    }
}
