<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Invite;
use App\Models\Team;
use App\Models\Role;

$factory->define(Invite::class, function (Faker $faker) {
    return [
        'code'    => $faker->md5,
        'email'   => $faker->email,
        'team_id' => factory(Team::class)->create()->id,
        'role_id' => factory(Role::class)->create()->id,
    ];
});
