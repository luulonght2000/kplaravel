<?php

namespace Database\Seeders;

use App\Models\PostModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 21; $i++) {
            PostModel::create([
                'title' => $faker->name,
                'user_id' => random_int(1, 4),
                'description' => $faker->text,
            ]);
        }
    }
}
