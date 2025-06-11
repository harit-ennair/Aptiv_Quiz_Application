<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'description' => fake()->sentence(),
            'formateur_id' => \App\Models\formateur::factory(),
            'resultat' => fake()->numberBetween(0, 100),
            'pourcentage' => fake()->numberBetween(0, 100),
            'create_at' => fake()->date(),
        ];
    }
}
