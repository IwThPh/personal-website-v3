<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        //
        'rank' => $faker->randomDigit,
        'name' => $faker->catchPhrase,
        'brief' => $faker->paragraph,
        'desc' => $faker->paragraph,
    ];
});
