<?php

use Faker\Generator as Faker;

$factory->define(Haricotton\Notification::class, function (Faker $faker) {
  # code...
   $now = date('Y-m-d H:i:s', strtotime('now'));

    return [
        //
        'subject' => $faker->word,
        'message' => $faker->sentence,
        'created_at'=> $now,
        'updated_at'=> $now
    ];
});