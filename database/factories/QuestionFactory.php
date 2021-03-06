<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use App\Model\Question;
use Faker\Generator as Faker;
use App\Model\Category;

$factory->define(App\Model\Question::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => Str::slug($title), // Slug is the same with title except it removes spaces
                                    //That means we can use title on slug too, to do that we declare
                                    //title at the top before return[] and then use it here
                                    // str_slug then takes the title string and it transforms it into 
                                    //slug requirements. P.S forum app -> with str_slug -> forum-app
        'body' => $faker->text,
        'category_id' => function(){
            return Category::all()->random();
        },
        'user_id' => function(){
            return App\User::all()->random();
        }
    ];
});
