<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
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
            'title' => $this->faker->word(),
            'description' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
            'image' => 'images/blog/article/' . $image . '.jpg',
        ];
    }
}
