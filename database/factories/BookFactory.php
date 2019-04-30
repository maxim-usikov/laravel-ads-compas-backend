<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Book;
use App\User;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->sentence(6, true)
    ];
});
