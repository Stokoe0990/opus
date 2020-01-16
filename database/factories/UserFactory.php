<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $firstName = $faker->unique()->firstName;
    $lastName  = $faker->lastName;
    $name      = $firstName . ' ' . $lastName;

    return [
        'name'          => $name,
        'slug'          => str_slug($name),
        'first_name'    => $firstName,
        'last_name'     => $lastName,
        'profile_image' => $faker->imageUrl(640, 480),
        'timezone'      => $faker->timezone,
        'email'         => $faker->email,
        'password'      => $faker->md5,
    ];
});
