<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReporteQuj>
 */
class ReporteQujFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(3,200),
            'queja_id' => fake()->numberBetween(1,200), 
            'txt_reporte' => fake()->text(80),
            'estatus' => 0,
        ];
    }
}
