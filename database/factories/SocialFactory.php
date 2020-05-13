<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Social;
use Faker\Generator as Faker;

$factory->define(Social::class, function (Faker $faker) {
    return [
        'project_id' => null,
        'name' => $faker->company,
        'ref' => '#',
    ];
});
