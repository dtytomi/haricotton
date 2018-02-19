<?php

namespace Haricotton\Http\Controllers;

use Haricotton\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    //
    public function index()
    {
      # code...
      return Help::all();
    }

    public function show($id)
    {
      # code...
      $help = Help::findOrFail($id);

      return $help;
    }

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

}
