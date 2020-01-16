<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\WatchWiki;
use App\Models\Wiki;
use App\Models\User;

$factory->define(WatchWiki::class, function (Faker $faker) {
    return [
        'wiki_id' => factory(Wiki::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
    ];
});
