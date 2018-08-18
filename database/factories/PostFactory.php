<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
    $name = $faker->name;
    $content = $faker->realText(rand(500, 5000));

    return [
        'category_id' => function () {
            $cat = new App\Category;

            return $cat->inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            $user = new App\User;

            return $user->inRandomOrder()->first()->id;
        },
        'title' => $name,
        'slug' => Str::slug($name),
        'teaser' => str_limit($content, 200),
        'content' => $content,
        'meta_description' => $faker->sentence,
        'is_draft' => rand(0, 1),
        'view_count' => rand(100, 400),
        'published_at' => $faker->date,
    ];
});

$factory->state('App\Post', 'test', [
    'category_id' => function () {
            return factory('App\Category')->create()->id;
    },
    'user_id' => function () {
        return factory('App\User')->create()->id;
    }
]);
