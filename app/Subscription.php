<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = [
      'name', 'membershipFee', 'dailyearnings',
      'weeklyEarnings', 'monthlyEarnings', 'annualEarnings'
      'referralEarnings' 
    ];

    public function investments()
    {
      # code...
      return $this->hasMany(Investment::class);
    }

}
