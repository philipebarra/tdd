<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Concert::class, function (Faker $faker) {
    return [
        'title' => 'Example Band',
        'subtitle' => 'with The Fake Openers',
        'date' => \Carbon\Carbon::parse('+ 2 weeks'),
        'ticket_price' => 2000,
        'venue' => 'The Example Theater',
        'venue_address' => '123 Example Lane',
        'city' => 'Fakeville',
        'state' => 'ON',
        'zip' => '90210',
        'additional_information' => 'For tickets, call (555) 555-5555.',
    ];
});

$factory->state(\App\Concert::class, 'published', function (Faker $faker) {
    return [
        'published_at' => \Carbon\Carbon::parse('-1 week'),
    ];
});

$factory->state(\App\Concert::class, 'unpublished', function (Faker $faker) {
    return [
        'published_at' => null,
    ];
});
