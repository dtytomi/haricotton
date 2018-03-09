<?php

namespace Haricotton\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
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
    $this->validate($request, ['name', 'required']);
    $this->validate($request, ['dailyEarnings', 'required']);
    $this->validate($request, ['weeklyEarnings', 'required']);
    $this->validate($request, ['monthlyEarnings', 'required']);
    $this->validate($request, ['annualEarnings', 'required']);
    $this->validate($request, ['referralEarnings', 'required']);

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

  public function update(Request $request, $subscriptionId)
  {
    # code...
    $subscription = Subscription::findOrFail($id);

    if ($request-> input('name') == $subscription['name']) {
      # code...
      $this->validate($request, ['name', 'required']);
      $this->validate($request, ['dailyEarnings', 'required']);
      $this->validate($request, ['referralEarnings', 'required']);

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
    } 

  }

  public function destroy($subscriptionId)
  {
    # code...
    $subscription = Subscription::findOrFail($id);

    $subscription->delete();
    return $subscription;
  }

}
