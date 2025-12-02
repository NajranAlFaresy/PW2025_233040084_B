<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat users
        User::factory(5)->create();

        // Membuat categoy
        Category::create(['name' => 'Teknologi']);
        Category::create(['name' => 'Pendidikan']);

        // Membuat Post
        Post::factory(10)->create();
    }
}