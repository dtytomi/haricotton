<?php

namespace Haricotton\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
      # code...
      return Order::all();
    }

    public function show($id)
    {
      # code...
      $order = Order::findOrFail($id);

      return $order;
    }

    public function store(Request $request)
    {
      # code...
      // validate our input 
      $this->validate($request, ['amount' => 'required']);
      $this->validate($request, ['reason' => 'required']);



      $order = Order::create([
        'amount' => $request->input('amount'),
        'reason' => $request->input('reason'),
        'status' => $request->input('status')
      ]);

      return $order;
    }
}
