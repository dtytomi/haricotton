<?php 

use Faker\Generator as Faker;

$factory->define(Haricotton\Investment::class, function (Faker $faker) {
  # code...
  $now = date('Y-m-d H:i:s', strtotime('now'));

    return [
        //
        'amountPaid' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'subscription_id' => $faker->numberBetween(1,10),
        'earningMethod' => $faker->randomElement(['Daily','Monthly','Annual']),
        'balance' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'user_id' => $faker->numberBetween(1,10),
        'created_at'=> $now,
        'updated_at'=> $now
    ];
});