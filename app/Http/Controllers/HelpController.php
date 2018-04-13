<?php

namespace Haricotton\Http\Controllers;

use Auth;
use Log;
use Haricotton\Help; 
use Haricotton\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelpController extends Controller
{
    // 
    public function index()
    {
      # code...
      $userId = Auth::user()->id;

      $helps = User::findOrFail($userId)->helps;

      return $helps;
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

      $user = User::findOrFail($userId);

      $this->validate($request, [
        'subject' => 'required',
        'message' => 'required',
      ]);
      
      $user->helps()->save(new Help([
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
      ]));

      return $user->helps;
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
