<?php

namespace Haricotton\Http\Controllers\Admin;


use Haricotton\User;
use Haricotton\Balance;
use Haricotton\Subscription;
use Haricotton\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Haricotton\Http\Controllers\Controller;

class AdminInvestmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('permission:users');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
      # code...
      $investors = Investment::with('user')->get();

      return $investors;
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      
      $investment = Investment::findOrFail($id);

      return $investment;
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'amountPaid' => 'required',
        'status' => 'required'
      ]);

      $input = $request->all();

      $status = $request->input('status');

      $subscriptionId = Investment::findOrFail($id)->subscription->id;
      $earningMethod = Investment::findOrFail($id)->earningMethod;
      $userId = Investment::findOrFail($id)->user->id;

      $interest = Subscription::select($earningMethod)
                        ->where('id', $subscriptionId)->first()->$earningMethod;

      if ($status == 'Confirmed') {

        $balance = new Balance();

        $balance->status = 'Pending';
        $balance->balance = $request->input('amountPaid');        
        $balance->payout = $interest;
        $balance->user_id = $userId;
        $balance->save();
      }

      $investment = Investment::findOrFail($id);

      $investment->update($input);

      return $investment; 
    } 

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $investment =  Investment::findOrFail($id);
      $investment->delete();

      return response()->json(['success' => true]);
    }

}
