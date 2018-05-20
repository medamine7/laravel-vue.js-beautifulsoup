<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'heading' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(2,10), true),
        'image' =>$faker->randomElement(["articles\May2018\w33SUnsU3pAwXKfhdxrg.jpg","articles\May2018\KAdemsTNA4BTb4deyYWc.jpg","articles\May2018\kC6vIer1wO5dcMRodaIE.jpg","articles\May2018\iQ0TjTpL7iBPOGun3dzD.jpg"]),
        'admin_id' => 1,
        'type' => 'text',
        'lang' => 'en',
        'category_id' => $faker->randomElement([1,2,3,4,5,6,7])
    ];
});
