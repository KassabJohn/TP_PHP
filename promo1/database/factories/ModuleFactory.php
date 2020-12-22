<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        "promo" => $faker->text(10),
        "description" => $faker->text(10)
    ];
});
