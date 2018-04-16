<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    //
    protected $fillable = [
      'balance', 'payout',
      'status',
    ];

    public function user()
    {
        return $this->belongsTo('Haricotton\User');
    }
}
