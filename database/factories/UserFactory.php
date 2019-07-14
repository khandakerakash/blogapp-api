<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Category;
use App\Person;
use App\Post;
use App\User;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//$factory->define(User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
//        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//        'remember_token' => Str::random(10),
//    ];
//});


// CATEGORY FACTORY
$factory->define(Category::class, function (Faker $faker) {
    $number = mt_rand(1,99);
    $file = Storage::disk('my_loc')->get("$number.jpg");
    $image = Image::make($file);
    $image->encode('jpg', 75);
    $fileName = uniqid('cat_') . ".jpg";

    // Saving original image
    $image->save(public_path('img/' . $fileName));

    $image->resize(200,200, function ($constraint) {
       $constraint->aspectRatio();
    });

    // Saving image after resize it
    $image->save(public_path('img/category/' . $fileName));

    return [
        'name' => $faker->unique()->name,
        'image' =>$fileName,
        'description' => $faker->text(200)
    ];
});


// PERSON FACTORY
$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_no' => $faker->phoneNumber,
        'address' => $faker->address
    ];
});

// POST FACTORY
$factory->define(Post::class, function (Faker $faker) {
    $number = mt_rand(1,99);
    $file = Storage::disk('my_loc')->get("$number.jpg");
    $image = Image::make($file);
    $image->encode('jpg', 75);
    $fileName = uniqid('cat_') . ".jpg";

    // Saving original image
    $image->save(public_path('img/' . $fileName));

    $image->resize(200,200, function ($constraint) {
        $constraint->aspectRatio();
    });

    // Saving image after resize it
    $image->save(public_path('img/post/' . $fileName));

    return [
        'title' => $faker->sentence,
        'image' =>$fileName,
        'body' => $faker->text(200)
    ];
});