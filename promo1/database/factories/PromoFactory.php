<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promo;
use Faker\Generator as Faker;

$factory->define(Promo::class, function (Faker $faker) {
    return [
        "promo" => $faker->randomElement(["B1", "B2", "B3", "M1", "M2"]),
        "moodle" => $faker->url,
        "description" => $faker->text,
        "schoolname" => $faker->name,
        "specialite" => $faker->randomElement(["Informatique", "3D Design", "Jeux-vidéos", "Audio & Son"])
    ];
});
