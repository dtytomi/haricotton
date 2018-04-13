<?php

namespace Haricotton;

use Illuminate\Support\Facades\Config;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password', 'affiliate_id', 'referred_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function profile()
    {
        return $this->hasOne('Haricotton\Profile');
    }

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function helps()
    {
        return $this->hasMany('Haricotton\Help');
    }

    public function investments()
    {
        return $this->hasMany('Haricotton\Investment');
    }

    public function balance()
    {
        return $this->hasOne('Haricotton\Balance');
    }

}
