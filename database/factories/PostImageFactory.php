<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostImage;
use Faker\Generator as Faker;

$factory->define(PostImage::class, function (Faker $faker) {
    return [
        'path' => '.jpeg',
        'featured' => $faker->numberBetween(0, 1)
    ];
});
