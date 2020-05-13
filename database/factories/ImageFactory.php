<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'filename' => $faker->word,
        'name' => $faker->word,
        'width' => 150.0,
        'height' => 150.0,
    ];
});
