<?php

namespace Haricotton;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
        'address', 'city', 'state', 
        'country', 'acctNumber', 'bankName'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function help()
    {
      # code...
      return $this->hasMany('Haricotton\Help');
    }

    public function roles()
    {
      # code...
      return $this
          -> belongsToMany('Haricotton\Role')
          ->withTimestamps();
    }

    public function users()
    {
      # code...
      return $this
          -> belongsToMany('Haricotton\User')
          ->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
      # code...
      if ($this -> hasAnyRole($roles)) {
        # code...
        return true;
      }
      abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
      # code...
      if (is_array($roles)) {
        # code...
        foreach ($roles as $role) {
          # code...
          if ( $this -> hasRole($role)) {
            # code...
            return true;
          }
        }
      } else {
        if ($this -> hasRole($roles)) {
          # code...
          return true;
        }
      }
      return false;
    }

    public function hasRole($role)
    {
      # code...
      if ($this -> roles() -> where('name', $role)) {
        # code...
        return true;
      }

      return false;
    }

    public function getReffarals()
    {
      # code...
      return RefarralProgram::all() -> map(function ($program)
      {
        # code...
        return RefarralProgramLink::getReffaral($this, $programs);
      });
    }

}
