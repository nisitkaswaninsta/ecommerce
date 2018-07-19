<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'total_price' => $faker->randomNumber(3)
    ];
});
