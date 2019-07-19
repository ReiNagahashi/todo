<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Todo;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(3),
        'complete' => 0
    ];
});
