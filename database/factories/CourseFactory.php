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
            //
			'title' => $this->faker->sentence(),
			'difficulty_level' => 'Beginner',
			'description' => $this->faker->paragraph(),
			'cover_url' => 'https://prabidhilabs.com/wp-content/uploads/2018/06/php-e8c6425acd65e1cbc012639ad25598c7.png',
        ];
    }
}
