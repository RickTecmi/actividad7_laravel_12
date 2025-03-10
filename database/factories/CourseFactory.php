<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        // Obtenemos IDs de kits existentes
        $kitIds = RoboticsKit::pluck('id')->toArray();

        return [
            'key' => 'Rob' . $this->faker->unique()->numberBetween(100, 999),
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraphs(3, true),
            'robotics_kit_id' => $this->faker->randomElement($kitIds)
        ];
    }
}
