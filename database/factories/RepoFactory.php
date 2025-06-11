<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\repo>
 */
class RepoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->paragraph(),
            'quz_id' => \App\Models\quz::factory(),
            'status' => fake()->boolean(),
            'create_at' => fake()->date(),
        ];
    }
}
