<?php

use Haricotton\Subscription;
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

        $subscriptions = [

          [
            'name' => 'Ordinary',
            'dailyEarnings' => 43.50,
            'weeklyEarnings' => 300,
            'monthlyEarnings' => 1300,
            'annualEarnings' => 15480,
            'membershipFee' => 5250,
            'referralEarnings' => 180
          ],

          [
            'name' => 'Bronze',
            'dailyEarnings' => 87.50,
            'weeklyEarnings' => 612.50,
            'monthlyEarnings' => 2625,
            'annualEarnings' => 31500,
            'membershipFee' => 15500,
            'referralEarnings' => 360
          ]

        ];

      foreach ($subscriptions as $key => $value) {
        Subscription::create($value);
      };
    }
}
