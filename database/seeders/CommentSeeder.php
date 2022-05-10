<?php

namespace Database\Seeders;

use App\Models\CommentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 50; $i++) {
            CommentModel::create([
                'post_id' => random_int(1, 20),
                'description' => $faker->text
            ]);
        }
    }
}
