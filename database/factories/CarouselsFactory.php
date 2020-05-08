<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Carousel;
use Faker\Generator as Faker;

$factory->define(Carousel::class, function (Faker $faker) {
    $random_int = $faker->numberBetween($min = 1, $max = 9000);
    return [
        'img_path' => 'https://loremflickr.com/1920/1080?random='.$random_int.'?lock=1',
    ];
});
