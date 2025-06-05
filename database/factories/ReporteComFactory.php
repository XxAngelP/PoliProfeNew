<?php

namespace Database\Factories;

use App\Models\ReporteCom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reporte>
 */
class ReporteComFactory extends Factory
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
            'comentario_id' => fake()->numberBetween(1,800), 
            'txt_reporte' => fake()->text(80),
            'estatus' => 0,
        ];
    }
}
