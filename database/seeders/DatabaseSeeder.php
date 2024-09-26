<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        //generate admin user
        User::factory()->admin()->create();

        $this->call(
            [
                CategorySeeder::class,
                PostSeeder::class,
            ]
        );
    }
}