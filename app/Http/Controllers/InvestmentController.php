<?php

namespace Haricotton\Http\Controllers;

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
}
