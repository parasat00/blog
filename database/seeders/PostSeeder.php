<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $inits = [];
        for ($i = 0; $i < 30; $i++) {
            $inits[] = [
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'user_id' => $faker->numberBetween(1, 2)
            ];
        }
        Post::insert($inits);
    }
}
