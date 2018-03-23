<?php

namespace Haricotton\Http\Controllers\Admin;

use Log;
use Auth;
use Haricotton\User;
use Haricotton\Role;
use Haricotton\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Haricotton\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:users');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
      # code...
      $roles = Role::get()->toArray();
      $data = User::whereHas('roles', function($q){
          $q->where('name', 'role-superadmin')
            ->orWhere('name', 'role-admin')
            ->orWhere('name', 'role-staff');})->with('roles')->get();
      return array($roles, $data);
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
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role' => 'required'
      ]);

      $input = $request->all();
      $input['password'] = Hash::make($input['password']);

      $user = User::create($input);

      $role = Role::find($request->input('role'))->first();

      $roleName = $role->{'name'};

      if ($roleName == 'role-admin') { 

        $permission = Permission::where('name', 'users')->first();
        if (!$role->perms()->get()->contains('id', $permission->id)) {
            $role->attachPermission($permission);
        }

      } elseif ($roleName == 'role-superadmin') {
         $permission = Permission::where('name', 'users')->first();
         if (!$role->perms()->get()->contains('id', $permission->id)) {
            $role->attachPermission($permission);
          }

      } elseif ($roleName == 'role-staff') {
        $permission = Permission::where('name', 'staff')->first();
        if (!$role->perms()->get()->contains('id', $permission->id)) {
            $role->attachPermission($permission);
        }
      }

      $user->roles()->attach($role);
  
      $user->save();

      return $user;

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      $user = User::find($id);
      return $user;
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
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles' => 'required'
      ]);

      $input = $request->all();

      if (!empty($input['password'])) {
        
        $input['password'] = Hash::make($input['password']);      
      } else {
          $input = array_except($input, array('password'));
      }
      
      $user = User::find($id);
      $user->update($input);
      DB::table('role_user')->where('user_id', $id)->delete();

      foreach ($request->input('roles') as $key => $value) {
        $user->attachRole($value);
      }

      return $user; 
    } 

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $currentUser = Auth::user();
      $user = User::findOrFail($id);

      if ($user->id != $currentUser->id) {
          
          $user->delete();

          return response()->json(['success' => true]);
      }

       return response()->json(['success' => false]);
    }
}
