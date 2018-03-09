<?php

use Haricotton\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $role = [

          [
            'name' => 'role-admin',
            'display_name' => 'Admin Role',
            'description' => 'Admin has admin privileges'
          ],

          [
            'name' => 'role-superadmin',
            'display_name' => 'SuperAdmin Role',
            'description' => 'SuperAdmin oversees the whole systems'
          ],

          [
            'name' => 'role-user',
            'display_name' => 'User Role',
            'description' => 'Users can create profile and make investment'
          ],

          [
            'name' => 'role-staff',
            'display_name' => 'Staff Role',
            'description' => 'Staff can only view users details'
          ]
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        };
    }
}
