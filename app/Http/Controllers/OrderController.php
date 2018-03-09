<?php

namespace Haricotton\Http\Controllers;

<<<<<<< HEAD
=======
use Haricotton\Order;
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
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
