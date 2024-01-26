<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

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
            'user_id' => $this->faker->numberBetween(1, 4),
            'item_id' => $this->faker->numberBetween(1, 17),
            'content' => $this->faker->realText($maxNbChars = 20)
        ];
    }
}
