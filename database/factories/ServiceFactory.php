<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $icones = [
        'flaticon-012-cube',
        'flaticon-001-picture',
        'flaticon-023-flask',
        'flaticon-011-compass',
        'flaticon-037-idea',
        'flaticon-039-vector',
        'flaticon-036-brainstorming',
        'flaticon-026-search',
        'flaticon-018-laptop-1',
        'flaticon-043-sketch'
    ];
    return [
        'icon' => $faker->randomElement($icones),
        'title' => $faker->word() ,
        'description' => $faker->sentence(20,true),
    ];
});
