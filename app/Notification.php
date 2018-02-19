<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
        'subject',
        'message'
    ];
}
