<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'cart_id' => function () {
            return factory(App\Cart::class)->create()->id;
        },
        'trans_id' => function () {
            return factory(App\Transaction::class)->create()->id;
        }
    ];
});
