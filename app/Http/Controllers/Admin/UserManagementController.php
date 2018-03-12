<?php

namespace Haricotton\Http\Controllers\Admin;

use Log;
use Auth;
use Haricotton\Role;
use Haricotton\User;
use Haricotton\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


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
      $data = User::get()->toArray();
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

      Log::info('Log message', array('context' => $request->all()));

      $user = User::create([
            'name' => $request->input['name'],
            'email' => $request->input['email'],
            'password' => Hash::make($request->input['password']),
        ]);

      $user->attachRole($request->input('role'));

      if (condition) {
        # code...
      }

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
      return view('users.show', compact('user'));
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
    public function delete($id)
    {
      $user = User::find($id)->delete();
      return $user;
    }
}
