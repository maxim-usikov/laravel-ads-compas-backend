<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Author;
use App\User;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'name' => $faker->name,
    ];
});
