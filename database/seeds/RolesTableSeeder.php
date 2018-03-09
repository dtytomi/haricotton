<?php

<<<<<<< HEAD
use Haricotton\Role;
=======
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
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
<<<<<<< HEAD
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
=======
       
        //
        factory(Haricotton\Role::class, 2)->create();
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
    }
}
