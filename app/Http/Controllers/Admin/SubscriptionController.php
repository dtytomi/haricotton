<?php

namespace Haricotton\Http\Controllers\Admin;

use Log;
use Auth;
use Haricotton\Http\Controllers\Controller;
use Haricotton\Permission;
use Haricotton\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
      # code...
      return Subscription::all();
    }


    public function show($id)
    {
      # code...
      $subscription = Subscription::findOrFail($id);

      return $subscription;
    }

    public function store(Request $request)
    { 

      # code...
      $this->validate($request, [
        'name' => 'required',
        'dailyEarnings' => 'required',
        'weeklyEarnings' => 'required',
        'monthlyEarnings' => 'required',
        'annualEarnings' => 'required',
        'membershipFee' => 'required',
        'referralEarnings' => 'required'

      ]);
    
      $subscription = Subscription::create([
        'name' => $request->input('name'),
        'membershipFee' => $request->input('membershipFee'),
        'dailyEarnings' => $request->input('dailyEarnings'),
        'weeklyEarnings' => $request->input('weeklyEarnings'),
        'monthlyEarnings' => $request->input('monthlyEarnings'),
        'annualEarnings' => $request->input('annualEarnings'),
        'referralEarnings' => $request->input('referralEarnings')
      ]);

      return $subscription;

    }

    public function update(Request $request, $id)
    { 
      
      # code...
      $subscription = Subscription::findOrFail($id);

      if ($request->input('name') == $subscription['name']) {
        # code...
        $this->validate($request, [
          'dailyEarnings' => 'required',
          'weeklyEarnings' => 'required',
          'monthlyEarnings' => 'required',
          'annualEarnings' => 'required',
          'membershipFee' => 'required',
          'referralEarnings' => 'required'
          ]);
        
        $subscription->update([
          'name' => $request->input('name'),
          'membershipFee' => $request->input('membershipFee'),
          'dailyEarnings' => $request->input('dailyEarnings'),
          'weeklyEarnings' => $request->input('weeklyEarnings'),
          'monthlyEarnings' => $request->input('monthlyEarnings'),
          'annualEarnings' => $request->input('annualEarnings'),
          'referralEarnings' => $request->input('referralEarnings')
        ]);

        return $subscription;
        
      } else {
          // Unprocessable entity
          return response()->json(['name' => 'Failure!'], 422);
      } 

    }

    public function destroy($id)
    {
      # code...
      $subscription = Subscription::findOrFail($id);

      $subscription->delete();
      return response()->json(['success' => true]);
    }

}
