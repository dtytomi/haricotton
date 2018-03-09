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
            'name' => 'role-list',
            'display_name' => 'Display Role Listing',
            'description' => 'See only Listing of Role'
          ],

          [
            'name' => 'role-create',
            'display_name' => 'Create Role',
            'description' => 'Create New Role'
          ],

          [
            'name' => 'role-edit',
            'display_name' => 'Edit Role',
            'description' => 'Edit Role'
          ],

          [
            'name' => 'role-delete',
            'display_name' => 'Delete Role',
            'description' => 'Delete Role'
          ],

          [
            'name' => 'profile-list',
            'display_name' => 'Display Profile Listing',
            'description' => 'See only Listing of Profile'
          ],

          [
            'name' => 'profile-create',
            'display_name' => 'Create Profile',
            'description' => 'Create New Profile'
          ],

          [
            'name' => 'profile-edit',
            'display_name' => 'Edit Profile',
            'description' => 'Edit Profile'
          ],

          [
            'name' => 'profile-delete',
            'display_name' => 'Delete Profile',
            'description' => 'Delete Profile'
          ],

          [
            'name' => 'users',
            'display_name' => 'Manage Users',
            'description' => 'Allow user to manage system users'
          ]

        ];

        foreach ($permission as $key => $value) {
          Permission::create($value);   
        }
    }
}
