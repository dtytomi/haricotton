<?php

namespace Haricotton\Http\Controllers;

<<<<<<< HEAD
use Auth;

use Haricotton\Help; 
use Haricotton\User;
=======
use Haricotton\Help;
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
use Illuminate\Http\Request;

class HelpController extends Controller
{
<<<<<<< HEAD
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

=======
    //
    public function index()
    {
      # code...
      return Help::all();
    }

>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
    public function show($id)
    {
      # code...
      $help = Help::findOrFail($id);

      return $help;
    }

<<<<<<< HEAD
   
    public function destroy($id)
    {
      # code...
      $help = Help::findOrFail($id);
      $help->delete();

      return $help;
    }
=======
    public function store(Request $request)
    {
      # code...
      // validate our input 
      $this->validate($request, ['subject' => 'required']);
      $this->validate($request, ['message' => 'required']);


      $help = Help::create([
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
      ]);

      return $help;
    }

>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
}
