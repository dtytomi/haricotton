<?php 

use Faker\Generator as Faker;

$factory->define(Haricotton\Order::class, function (Faker $faker) {
  # code...
  $now = date('Y-m-d H:i:s', strtotime('now'));

    return [
        //
        'amount' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'reason' => $faker->text,
        'status' => $faker->randomElement(['Pending','Approved','DisApproved']),
        'user_id' => $faker->numberBetween(1,10),
        'created_at'=> $now,
        'updated_at'=> $now
    ];
});