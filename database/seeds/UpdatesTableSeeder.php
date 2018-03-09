<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UpdatesTableSeeder extends Seeder
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

          DB::table('updates')->insert([
              'subject' => $faker->word,
              'message' => $faker->sentence,
              'created_at'=> $now,
              'updated_at'=> $now
          ]);

        }

    }
}
