<?php

namespace Haricotton\Http\Controllers;

use Auth;

use Haricotton\Help; 
use Haricotton\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelpController extends Controller
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

    
    public function index()
    {
      # code...
      $userId = Auth::user()->id;

      $helps = User::findOrFail($userId)->helps;

      return Help::all();
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    { 
      # code...
      $userId = Auth::user()->id;

      $user = User::with('helps')->findOrFail($userId);

      $this->validate($request, [
        'subject' => 'required',
        'message' => 'required',
      ]);

      
      $help = new Help();
      $help->fill($request->all());
      $user->helps()->save($help);

      $user->save();

      return $help;

    }

    public function show($id)
    {
      # code...
      $help = Help::findOrFail($id);

      return $help;
    }
   
    public function destroy($id)
    {
      # code...
      $help = Help::findOrFail($id);
      $help->delete();

      return response()->json(['success' => true]);
    }
}
