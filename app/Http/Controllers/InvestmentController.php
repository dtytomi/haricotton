<?php

namespace Haricotton\Http\Controllers;

use Auth;
use Haricotton\User;
use Haricotton\Investment;
use Haricotton\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InvestmentController extends Controller
{
    //
    public function index()
    {
      # code...
      $userId = Auth::user()->id;

      return Investment::where('user_id', $userId)->with('subscription')->get();
    }

    public function show($id)
    {
      # code...
      $investment = Investment::findOrFail($id);

      return $investment;
    }

    public function store(Request $request)
    {
      # code...
      // validate our input 
      $this->validate($request, ['amountPaid' => 'required']);
      $this->validate($request, ['earningMethod' => 'required']);
      $this->validate($request, ['packageName' => 'required']);

      $input = $request->all();

      $investment = new Investment();
      $investment->fill($input);


      $user = Auth::user();
      $subscription = Subscription::findOrFail($input['packageId']);

      $investment->subscription_id =  $subscription->id;
      
      $user->investment()->save($investment);

      $investment->save();

      return $investment;
    }
}
