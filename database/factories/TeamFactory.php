<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Team;
use App\Models\User;

$factory->define(Team::class, function (Faker $faker) {
    $name = $faker->company;

    return [
        'name'      => $name,
        'slug'      => str_slug($name),
        'team_logo' => $faker->imageUrl(640, 480),
        'user_id'   => factory(User::class)->create()->id,
    ];
});
