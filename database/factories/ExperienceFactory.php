<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Experience;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    return [
            'name' => $faker->jobTitle,
            'location' => $faker->company,
            'start_at' => $faker->dateTime,
            'end_at' => $faker->dateTime,
    ];
});
