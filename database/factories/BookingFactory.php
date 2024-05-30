<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'timetable_id' => Timetable::get()->random()->id,
            'user_id' => User::get()->random()->id,
            'status' => 'pending'
        ];
    }
}
