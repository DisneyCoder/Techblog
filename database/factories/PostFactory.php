<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $title = $this->faker->realText(random_int(10, 60));

        return [
            'user_id' => User::first()->id, // Avoid errors if no user exists
            'category_id' => Category::inRandomOrder()->first()->id, //?? null, // Avoid errors if no category exists
            'title' => $title,
            'slug' => str($title)->slug(),
            'body' => $this->faker->realText(random_int(500, 1000)),
            'views' => random_int(5, 1000),
        ];
    }
}