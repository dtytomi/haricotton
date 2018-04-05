<?php

namespace Haricotton\Http\Controllers\Admin;

use Log;
use Haricotton\User;
use Illuminate\Http\Request;
use Haricotton\Http\Controllers\Controller;

class AdminInvestmentController extends Controller
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
      $users = User::with('investment')->get();

      return $users;
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      Log::info('I am user' . $id);
      $user = User::findOrFail($id)->with('investment')->get();
      
      return $user;
    }

}
