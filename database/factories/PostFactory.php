<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'title' => $this->faker->unique()->word,
            'content' => $this->faker->text(1000),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'is_published' => $this->faker-> dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
        ];
    }
}
