<?php

namespace Database\Factories;

use App\Enum\Level;
use App\Models\Child;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => Child::factory()->create()->id,
            'teacher_id' => Teacher::factory()->create()->id,
            'course_id' => Course::factory()->create()->id,
            'level' => $this->faker->randomElement([Level::GOOD,Level::WEAK,Level::EXCELLENT])
        ];
    }
}
