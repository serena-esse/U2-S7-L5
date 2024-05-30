<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prices=[40, 50, 60, 70, 80];
        return [
            'title' => fake()->text(20),
            'description' => fake()->text(500),
            'price' => fake()->randomElement($prices)
        ];
    }
}
