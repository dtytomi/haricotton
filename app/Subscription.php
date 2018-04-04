<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // 
    protected $fillable = [
      'name', 'membershipFee', 'dailyEarnings',
      'weeklyEarnings', 'monthlyEarnings', 'annualEarnings',
      'referralEarnings',
    ];

    public function investment()
    {
        return $this->hasOne('Haricotton\Investment');
    }

}
