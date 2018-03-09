<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker  = Faker::create();

        foreach (range(1, 10) as $index) {
          $now = date('Y-m-d H:i:s', strtotime('now'));
          DB::table('subscriptions')->insert([
              'name' => $faker->Word .'Package',
              'dailyEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
              'weeklyEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
              'monthlyEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
              'annualEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
              'referralEarnings' => $faker->randomNumber($nbDigits = NULL, $strict = false),
              'created_at'=> $now,
              'updated_at'=> $now
          ]);
        }
    }
}
