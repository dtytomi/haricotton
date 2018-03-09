<?php

namespace Haricotton\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //
    public function index()
    {
      # code...
      return Notification::all();
    }

    public function show($id)
    {
      # code...
      $notification = Notification::findOrFail($id);

      return $notification;
    }

    public function store(Request $request)
    {
      # code...
      // validate our input 
      $this->validate($request, ['subject' => 'required']);
      $this->validate($request, ['message' => 'required']);


      $notification = Notification::create([
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
      ]);

      return $notification;
    }
}
