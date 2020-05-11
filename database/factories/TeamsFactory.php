<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $random_int = $faker->numberBetween($min = 1, $max = 9000);
    return [
        'pic_path' => 'https://loremflickr.com/360/448/boy,girl?random='.$random_int,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'role' => $faker->jobTitle,
    ];
});
