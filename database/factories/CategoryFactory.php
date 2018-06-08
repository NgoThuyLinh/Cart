<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'slug' => str_slug($faker->company),
        'description'=>'Xin chào'
    ];
});
