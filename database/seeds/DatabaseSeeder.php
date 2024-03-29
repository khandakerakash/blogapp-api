<?php

use App\Category;
use App\Person;
use App\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Calling Category Table Seeder
        // $this->call(CategoryTableSeeder::class);

         factory(Category::class,100)->create();
         factory(Person::class,100)->create();
         factory(Post::class,100)->create();
    }
}
