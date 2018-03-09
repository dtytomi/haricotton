<?php

namespace Haricotton\Http\Controllers;

<<<<<<< HEAD
=======
use Haricotton\Investment;
use Haricotton\Subscription;
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function index()
    {
      # code...
      return Investment::all();
    }

    public function show($id)
    {
      # code...
      $investment = Investment::findOrFail($id);

      return $investment;
    }

    public function store(Request $request, $subscriptionId)
    {
      # code...
      // validate our input 
      $this->validate($request, ['amountPaid' => 'required']);
      $this->validate($request, ['earningMethod' => 'required']);
      $this->validate($request, ['balance' => 'required']);

      $investment = Investment::create([
        'amountPaid' => $request->input('amountPaid'),
        'earningMethod' => $request->input('earningMethod'),
        'balance' => $request->input('balance'),
      ]);

      return $investment;
    }
<<<<<<< HEAD
=======

    
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
}
