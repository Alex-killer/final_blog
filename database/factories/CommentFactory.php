<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'post_id' => rand(1, 50),
            'description' => $this->faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        ];
    }
}
