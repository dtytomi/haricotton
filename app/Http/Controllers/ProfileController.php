<?php

namespace Haricotton\Http\Controllers;

use Auth;

use Haricotton\Profile;
use Haricotton\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProfileController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    //
    public function index()
    {
      $user = Auth::user();

      return $user;
    }

    public function show($id)
    {
        $userId = $id ?: auth()->user()->id;
        
        $user = User::with('profile')->findOrFail($userId)->profile;

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
      
      $userId = $id ?: auth()->user()->id;
      $user = User::with('profile')->findOrFail($userId);

      $this->validate($request, [
        'acctName' => 'required',
        'acctNumber' => 'required',
        'phoneNumber' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'bankName' => 'required'
      ]);

      $input = Input::only('acctName', 'acctNumber', 'address', 
        'bankName', 'city', 'country',
       'email', 'name', 'phoneNumber', 'state');
 

      if ($user->profile == null) {
          $profile = new Profile();
          $profile->fill($input);
          $user->profile()->save($profile);
      } else {
          $user->profile->fill($input)->save();
      }
      
      $user->save();

      return $user;       
      
    }

}
