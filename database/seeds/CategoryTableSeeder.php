<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Category::create([
                'name' => $faker->word,
                'description' => $faker->paragraph
            ]);
        }
    }
}
