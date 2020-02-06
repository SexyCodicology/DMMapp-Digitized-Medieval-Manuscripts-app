<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;

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

/* NOTE Here we are creating the Admin user. We have set up an dummy account to get your started. */

$factory->define(User::class, function () {
    return [
        'name' => 'admin',
        'email' => 'admin@example.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$Dt6YyBnGIHSS1w3UaLmxMO79fFq0Wew0zGehlxNADlyEoU2iby/tG', // password
        'remember_token' => Str::random(10),
    ];
});