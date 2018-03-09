<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    //
    protected $fillable = [
        'subject', 'message',
        'user_id'
    ];


    public function users()
    {
      # code...
      return $this
          -> belongsToMany('Haricotton\User');
    }
}
