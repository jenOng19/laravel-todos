<?php

use Faker\Generator as Faker;

//Model name::class
$factory->define(\App\Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(4),
        'completed' => false
    ];
});
