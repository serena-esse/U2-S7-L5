<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timetable>
 */
class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days=['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',];
        $time=['16:00', '17:00', '18:00', '19:00', '20:00', '21:00' ];
        $available_places=[10, 20 , 30, 40 ];

        return [
            'course_id' => Course::get()->random()->id,
            'days' => fake()->randomElement($days),
            'time' => fake()->randomElement($time),
            'available_places' =>fake()->randomElement($available_places)
        ];
    }
}
