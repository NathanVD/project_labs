<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    $random_int = $faker->numberBetween($min = 1, $max = 9000);
    return [
        // 'profile_picture_path' => 'http://placeimg.com/100/100/people?t=1588858960163',
        'profile_picture_path' => 'https://loremflickr.com/100/100/boy,girl?random='.$random_int.'?lock=1',
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'job_title' => $faker->jobTitle,
        'testimony' => $faker->text(175),
    ];
});
