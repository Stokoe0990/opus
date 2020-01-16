<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Comment;
use App\Models\Wiki;
use App\Models\Page;
use App\Models\User;

$factory->define(Comment::class, function (Faker $faker) {
    $subjectType = $faker->randomElement(
        [
            Wiki::class, Page::class
        ]
    );

    return [
        'content'      => $faker->paragraph,
        'subject_type' => $subjectType,
        'subject_id'   => strpos($subjectType, 'Wiki') ?
                            factory(Wiki::class)->create()->id :
                            factory(Page::class)->create()->id,
        'user_id'      => factory(User::class)->create()->id,
    ];
});
