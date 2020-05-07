<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'profile_picture_path' => 'http://placeimg.com/100/100/people?t=1588858960163',
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'job_title' => $faker->jobTitle,
        'testimony' => $faker->text(175),
    ];
});
