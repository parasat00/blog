<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $inits = [];
        for ($i = 0; $i < 10; $i++) {
            $inits[] = [
                'name' => $faker->word,
            ];
        }
        Category::insert($inits);
    }
}
