<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    $random_int = $faker->numberBetween($min = 1, $max = 9000);
    return [
        'img_path' => 'https://loremflickr.com/100/100/boy,girl?random='.$random_int.'?lock=1',
        'name' => $faker->name,
        'description' => $faker->sentences(3,true),
    ];
});
