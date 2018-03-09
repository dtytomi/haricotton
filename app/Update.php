<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    //
    protected $fillable = [
        'subject',
        'message'
    ];
}
