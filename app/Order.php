<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'amount', 'reason',
        'status', 'user_id'
    ];
}
