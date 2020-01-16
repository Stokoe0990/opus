<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\PageTags;
use App\Models\Wiki;
use App\Models\Page;
use App\Models\Tag;

$factory->define(PageTags::class, function (Faker $faker) {
    $subjectType = $faker->randomElement([Wiki::class, Page::class]);

    return [
        'tag_id'       => factory(Tag::class)->create()->id,
        'subject_type' => $subjectType,
        'subject_id'   => str_contains($subjectType, 'Wiki') ? factory(Wiki::class)->create()->id : factory(Page::class)->create()->id,
    ];
});
