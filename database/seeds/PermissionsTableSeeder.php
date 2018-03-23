<?php

use Haricotton\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission = [

          [
            'name' => 'role',
            'display_name' => 'Display Role Listing',
            'description' => 'See only Listing of Role'
          ],

          [
            'name' => 'profile',
            'display_name' => 'Display Profile Listing',
            'description' => 'See only Listing of Profile'
          ],

          [
            'name' => 'users',
            'display_name' => 'Manage Users',
            'description' => 'Allow user to manage system users'
          ],

          [
            'name' => 'staff',
            'display_name' => 'View Users',
            'description' => 'Allow user to view system users'
          ]

        ];

        foreach ($permission as $key => $value) {
          Permission::create($value);   
        }
    }
}
