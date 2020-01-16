<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Activity;
use App\Models\Wiki;
use App\Models\Page;
use App\Models\Space;
use App\Models\Comment;
use App\Models\User;
use App\Models\Team;

$factory->define(Activity::class, function (Faker $faker) {
    $subject     = '';
    $subjectType = $faker->randomElement([Wiki::class, Page::class, Space::class, Comment::class]);

    switch ($subjectType) {
        case str_contains($subjectType, 'Wiki'):
            $subject = factory(Wiki::class)->create();
            break;
        case str_contains($subjectType, 'Page'):
            $subject = factory(Page::class)->create();
            break;
        case str_contains($subjectType, 'Space'):
            $subject = factory(Space::class)->create();
            break;
        default:
            $subject = factory(Comment::class)->create();
            break;
    }

    return [
        'name'         => $faker->randomElement(['wiki_created', 'wiki_deleted', 'wiki_updated', 'page_created', 'page_deleted', 'page_updated', 'comment_created', 'comment_deleted', 'comment_updated', 'space_created', 'space_deleted', 'space_updated',]),
        'subject_type' => $subjectType,
        'subject_id'   => $subject->id,
        'user_id'      => factory(User::class)->create()->id,
        'team_id'      => factory(Team::class)->create()->id,
    ];
});
