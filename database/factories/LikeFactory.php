<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Like;
use App\Models\Wiki;
use App\Models\Page;
use App\Models\Comment;
use App\Models\User;

$factory->define(Like::class, function (Faker $faker) {
    $subjectType = $faker->randomElement(
        [
            Wiki::class,
            Page::class,
            Comment::class
        ]
    );

    switch ($subjectType) {
        case str_contains($subjectType, 'Wiki'):
            $subject = factory(Wiki::class)->create();
            break;
        case str_contains($subjectType, 'Page'):
            $subject = factory(Page::class)->create();
            break;
        default:
            $subject = factory(Comment::class)->create();
            break;
    }

    return [
        'subject_type' => $subjectType,
        'subject_id'   => $subject->id,
        'user_id'      => factory(User::class)->create()->id,
    ];
});
