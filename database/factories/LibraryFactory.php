<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Library;
use Illuminate\Support\Str;
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

/* NOTE Here you can define the dummy data that you want entered in your database. If you made modifications in the
        "database\migrations\2018_10_16_105239_create_libraries_table.php" file by renaming, adding, or removing folders
        you will have to make similar changes here too.*/

$factory->define(Library::class, function () {
    return [

        'nation' => 'Italy',
        'city' => 'Rome',
        'library' => 'Library Name',
        'lat' => '41.902782',
        'lng' => '12.496365',
        'quantity' => 'Hundreds',
        'website' => 'https://example.com',
        'copyright' => 'Public domain',
        'notes' => 'This is a sample library. You can edit or delete it.',
        'IIIF' => 'iiif conform',
        'is_part_of' => 'Part of the Sexy Codicology Family!',

    ];
});