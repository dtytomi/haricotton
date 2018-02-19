<?php

use Faker\Generator as Faker;

$factory->define(Haricotton\Help::class, function (Faker $faker) {

    $now = date('Y-m-d H:i:s', strtotime('now'));

    return [
        //
        'subject' => $faker->text,
        'message' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1,10),
        'created_at'=> $now,
        'updated_at'=> $now
    ];
});
