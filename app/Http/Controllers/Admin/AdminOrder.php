<?php

namespace Haricotton\Http\Controllers\Admin;

use Haricotton\Balance;
use Haricotton\Investment;
use Illuminate\Http\Request;
use Haricotton\Http\Controllers\Controller;

class AdminOrder extends Controller
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
      $balances = Balance::where('status', 'Pending')->with('user')->get();

      return $balances;
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      
      $balance = Balance::findOrFail($id);

      return $balance;
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
        'balance' => 'required',
        'payout' => 'required',
        'status' => 'required'
      ]);

      $input = $request->all();

      $investmentId = Balance::findOrFail($id)->investment_id;

      $earningMethod = Investment::findOrFail($investmentId)->earningMethod;

      switch ($earningMethod) {
        case 'weeklyEarnings':
          $date = date("Y-m-d h:i:s", strtotime("+1 week"));
          break;
        
        case 'monthlyEarnings':
          $date = date("Y-m-d h:i:s", strtotime("+1 Month"));
          break;

        default:
          break;
      }

      $balance = Balance::findOrFail($id);

      $newBalance = new Balance();
      $newBalance->status = 'Pending';
      $newBalance->balance = $balance->balance;        
      $newBalance->payout = $balance->payout;
      $newBalance->user_id = $balance->user_id;
      $newBalance->investment_id = $investmentId;
      $newBalance->due_date = $date;
      $newBalance->save();

      $balance->update($input);

      return $balance; 
    } 

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $balance =  Investment::findOrFail($id);
      $balance->delete();

      return response()->json(['success' => true]);
    }

}
