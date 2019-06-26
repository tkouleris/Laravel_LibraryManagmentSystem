<?php

use App\Book;
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

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(70),
        'isbn10' => $faker->isbn10,
        'isbn13' => $faker->isbn13,
        'edition' => rand(1, 10),
        'year' => rand(1930, 2016),
    ];
});
