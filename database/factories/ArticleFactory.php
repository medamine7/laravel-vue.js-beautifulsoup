<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'heading' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(2,10), true),
        'image' => '5adb253bc5a4b02bde77104b_default.jpg',
        'admin_id' => 1,
        'type' => $faker->randomElement(['text','video']),
        'lang' => 'en',
        'category_id' => $faker->randomElement([1,2,3])
    ];
});
