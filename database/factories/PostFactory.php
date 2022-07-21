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
        $image = rand(1, 10);

        return [
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'title' => $this->faker->unique()->word,
            'content' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
            'image' => 'images/blog/post/' . $image . '.jpg',
            'is_published' => $this->faker-> dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
        ];
    }
}
