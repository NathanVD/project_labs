<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    $pictures = [
    '/img/01.jpg',
    '/img/02.jpg',
    '/img/03.jpg',
    ];
    return [
        'profile_picture_path' => $faker->randomElement($pictures),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'job_title' => $faker->jobTitle,
        'testimony' => $faker->text(175),
    ];
});
