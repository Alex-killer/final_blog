<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostUserLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 12),
            'post_id' => rand(1, 50),
        ];
    }
}
