<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Queja>
 */
class QuejaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'c_queja_id' => fake()->numberBetween(1,12),
            'profesores_id' => fake()->numberBetween(1,200),
            'users_id' => fake()->numberBetween(1,200),
            'comentario' => fake()->text(256),
            'cm' => fake()->optional()->text(45),
        ];
    }
}
