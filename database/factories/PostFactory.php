<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'published_at' => $faker->dateTimeThisYear(),
        'visible' => 1,
        'text' => '<p>' . $faker->realText(3000) . '</p>',
        'excerpt' => '<p>' . $faker->realText(500) . '</p>',
        'lang_id' => 'es',
        'featured' => $faker->numberBetween(0, 1),
        'post_category_id' => $faker->numberBetween(1, 2)
    ];
});
