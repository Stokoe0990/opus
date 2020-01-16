<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Wiki;
use App\Models\Space;
use App\Models\User;
use App\Models\Team;

$factory->define(Wiki::class, function (Faker\Generator $faker) {
    $name = $faker->name;

    return [
        'name'        => $name,
        'slug'        => str_slug($name),
        'space_id'    => factory(Space::class)->create()->id,
        'outline'     => $faker->paragraph,
        'description' => $faker->paragraph,
        'user_id'     => factory(User::class)->create()->id,
        'team_id'     => factory(Team::class)->create()->id,
    ];
});
