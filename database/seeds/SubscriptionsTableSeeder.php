<?php

<<<<<<< HEAD
use Faker\Factory as Faker;
=======
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
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
<<<<<<< HEAD
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
=======
        factory(Haricotton\Subscription::class, 5)->create();
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
    }
}
