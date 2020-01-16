<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Integration;
use App\Models\Team;
use App\Models\User;

$factory->define(Integration::class, function (Faker $faker) {
    return [
        'title'   => $faker->title,
        'slug'    => $faker->slug,
        'url'     => $faker->url,
        'team_id' => factory(Team::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
    ];
});
