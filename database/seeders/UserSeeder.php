<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $inits = [
            [
                'name' => 'Parassat Zhangbyrbay',
                'email' => 'admin@admin.com',
                'role' => 1,
                'password' => bcrypt('Qqwerty1?'),
                'image' => $faker->imageUrl(360, 360, 'animals', true, 'cats')
            ],
            [
                'name' => 'Parassat Zhangbyrbay',
                'email' => 'writer@writer.com',
                'role' => 2,
                'password' => bcrypt('Qqwerty1?'),
                'image' => $faker->imageUrl(360, 360, 'animals', true, 'cats')
            ],
            [
                'name' => 'Parassat Zhangbyrbay',
                'email' => 'user@user.com',
                'role' => 3,
                'password' => bcrypt('Qqwerty1?'),
                'image' => $faker->imageUrl(360, 360, 'animals', true, 'cats')
            ]
        ];
        User::insert($inits);
    }
}
