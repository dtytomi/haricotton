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
        // $this->call(RolesTableSeeder::class);
        // $this->call(NotificationsTableSeeder::class);
        $this->call(HelpsTableSeeder::class);
        // $this->call(OrdersTableSeeder::class);
        // $this->call(InvestmentsTableSeeder::class);
        // $this->call(SubscriptionsTableSeeder::class);
    }
}
