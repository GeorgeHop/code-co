<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(30),
            'is_on_homepage' => false,
            'author_id' => null,
            'info' => $this->faker->realText(200),
            'cost' => 100,
            'duration' => 60,
            'thumbnail' => null,
            'is_free' => null
        ];
    }
}
