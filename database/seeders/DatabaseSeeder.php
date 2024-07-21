<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            CategorySeeder::class
        ]);
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->categories()->attach(Category::inRandomOrder()->first());
        }
    }
}
