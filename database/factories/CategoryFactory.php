<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $categories = [
            'Development',
            'AI',
            'Cloud',
            'Security',
            'Data',
            'DevOps',
            'Testing',
            'Blockchain',
            'IoT',
            'Design'
        ];

        $category = fake()->unique()->randomElement($categories);
        return [
            'name' => $category,
            'slug' => str($category)->slug(),
        ];
    }
}