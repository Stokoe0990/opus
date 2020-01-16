<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Role;
use App\Models\User;
use App\Models\Team;

$factory->define(Role::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name'    => $name,
        'slug'    => str_slug($name),
        'user_id' => factory(User::class)->create()->id,
        'team_id' => factory(Team::class)->create()->id,
    ];
});
