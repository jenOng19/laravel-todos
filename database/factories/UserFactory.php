<?php

//package used to generate fake data
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//can also do 'App\User' which defines the path to the class, App\User::class gives you the string version of the class
//different syntax that does the same thing
//define a factory for the App\User class
$factory->define(App\User::class, function (Faker $faker) {
    //defines an array that generates fake data that can be used to put in the database
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
