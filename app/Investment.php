<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $fillable = [
        'amountPaid', 'subscription_id',
        'user_id', 'earningMethod',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('Haricotton\User');
    }

    public function subscription()
    {
        return $this->belongsTo('Haricotton\Subscription');
    }

    public function balance()
    {
        return $this->belongsTo('Haricotton\Balance');
    }

}