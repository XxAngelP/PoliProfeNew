<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsersFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellido_p' => fake()->lastName(),
            'apellido_m' => fake()->lastName(),
            'boleta' => fake()->boolean(80) ? fake()->unique()->numberBetween(2020000000, 2026000000) : null,
            'correo' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'is_auth' => fake()->numberBetween(0,1),
            'img_url' => fake()->optional()->text(41),
        ];
    }
}
