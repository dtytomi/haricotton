<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach (range(1, 10) as $index) {
          $now = date('Y-m-d H:i:s', strtotime('now'));
          DB::table('investments')->insert([
            'amountPaid' => $faker->randomNumber($nbDigits = NULL, $strict = false),
            'subscription_id' => $faker->numberBetween(1,10),
            'earningMethod' => $faker->randomElement(['Daily','Monthly','Annual']),
            'balance' => $faker->randomNumber($nbDigits = NULL, $strict = false),
            'user_id' => $faker->numberBetween(1,10),
            'created_at'=> $now,
            'updated_at'=> $now
          ]);
        }

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
