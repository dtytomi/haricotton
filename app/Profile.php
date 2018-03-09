<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'address', 'city', 'state', 'acctName',
        'country', 'acctNumber', 'bankName', 'phoneNumber'
    ];

    public function user()
    {
      return $this->belongsTo('Haricotton\User');
    }

    public function scopeOfUser($query, $userId)
    {
      # code...
      return $query->where('user_id', $userId);
    }

}
