<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Wiki;
use App\Models\Team;

$factory->define(Page::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name'        => $name,
        'slug'        => str_slug($name),
        'outline'     => $faker->paragraph,
        'description' => $faker->paragraph,
        'position'    => $faker->numberBetween(0, 10),
        'user_id'     => factory(User::class)->create()->id,
        'wiki_id'     => factory(Wiki::class)->create()->id,
        'team_id'     => factory(Team::class)->create()->id,
    ];
});
