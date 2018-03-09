<?php

<<<<<<< HEAD
use Faker\Factory as Faker;
=======
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
use Illuminate\Database\Seeder;

class HelpsTableSeeder extends Seeder
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

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach (range(1,10) as $index) {
            
          $now = date('Y-m-d H:i:s', strtotime('now'));

          DB::table('helps')->insert([
            'subject' => $faker->text,
            'message' => $faker->paragraph,
            'user_id' => $faker->numberBetween(1,10),
            'created_at'=> $now,
            'updated_at'=> $now
          ]);
        }

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
=======
        factory(Haricotton\Help::class, 5)->create();
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
    }
}
