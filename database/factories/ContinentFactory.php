<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Continent::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name()
    ];
});