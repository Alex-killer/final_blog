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
        $image = rand(1, 50);

        return [
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'title' => $this->faker->unique()->word,
            'content' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
            'image' => 'https://picsum.photos/id/' . $image . '/800/500',
            'is_published' => $this->faker-> dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
        ];
    }
}
