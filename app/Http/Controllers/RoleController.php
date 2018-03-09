<?php

namespace Haricotton\Http\Controllers;

use Haricotton\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
      # code...
      $roles = Role::all();
      return $roles;
    }

    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:roles,name',
        'display_name' => 'required',
        'description' => 'required',
        'permission' => 'required'
      ]);

      $role = new Role();
      $role->name = $request->$input('name');
      $role->display_name = $request->$input('display_name');
      $role->description = $request->$input('description');
      $role->save();
      
      foreach ($request->input('permission') as $key => $value) {
        $role->attachPermission($value);
      }

      return $role;
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      $role = Role::find($id);
      $rolePermissions = Permission::join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
          ->where('permission_role.role_id', $id)
          ->get();


      return $role;
    }


    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'display_name' => 'required',
        'description' => 'required',
        'permission' => 'required'
      ]);

      $role = Role::find($id);
      $role->display_name = $request->$input('display_name');
      $role->description = $request->$input('description');
      $role->save();

      DB::table('permission_role')->where('permission_role.role_id', $id)
          ->delete();
      
      foreach ($request->input('permission') as $key => $value) {
        $role->attachPermission($value);
      }

      return $role;

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function delete($id)
    {
      $role =  DB::table('roles')->where('id', $id)
          ->delete();
      return $role;
    }
}
