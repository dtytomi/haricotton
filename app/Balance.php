<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    //
    protected $fillable = [
      'balance', 'payout', 'user_id',
      'status', 'investment_id'
    ];

    public function user()
    {
        return $this->belongsTo('Haricotton\User');
    }

    public function investment()
    {
        return $this->hasOne('App\Investment');
    }
}
