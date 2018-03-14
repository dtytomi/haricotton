<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(HelpsTableSeeder::class);
        // $this->call(InvestmentsTableSeeder::class);
        // $this->call(NotificationsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        // $this->call(SubscriptionsTableSeeder::class);
    }
}
