<?php

namespace Database\Factories;

use App\Models\Valoracion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Valoracion>
 */
class ValoracionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 20),
            'libro_id' => fake()->numberBetween(1, 20),
            'comentario' => fake()->text(200),
            'estrellas' => fake()->numberBetween(1, 5),
        ];
    }
}
