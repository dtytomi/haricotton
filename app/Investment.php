<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $fillable = [
        'amountPaid', 'subscription_id',
        'intrestRate' 'balance', 'user_id'
    ];

    public function Investments()
    {
      # code...
      return $this->belongsTo(Investment::class);
    }

    public function scopeOfSubscription($query, $subscriptionId)
    {
      # code...
      return $query->where('subscription_id', $subscriptionId);
    }

    public function getBalance()
    {
      # code...
      // $amountPaid = DB::select('select * from investments where ')
      // return  $newBalance = DB::table('subscriptionId');
    }

}
  