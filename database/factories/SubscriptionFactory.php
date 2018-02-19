<?php 

use Faker\Generator as Faker;

$factory->define(Haricotton\Subscription::class, function (Faker $faker) {
  # code...
  $now = date('Y-m-d H:i:s', strtotime('now'));

    return [
        //
        'name' => $faker->Word .'Package',
        'dailyEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'weeklyEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'monthlyEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'annualEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'referralEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'created_at'=> $now,
        'updated_at'=> $now
    ];
});