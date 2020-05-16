<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $filePath = storage_path('images');
    if(!File::exists($filePath)){
        File::makeDirectory($filePath);
    }
    return [
        // 'filename' => $faker->image($filePath,150,150, null, false),
        'filename' => 'temp.jpg',
        'name' => $faker->word,
        'width' => 150.0,
        'height' => 150.0,
    ];
});
