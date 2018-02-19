<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

use Ramsey\Uuid\Uuid;

class ReferralLink extends Model
{
    //
    protected $fillable = [
      'user_id', 'referral_program_id' 
    ];

    protected static function boot()
    {
      # code...
      static::creating(function (ReferralLink $model)
      {
        # code...
        $model->generatedCode();
      });
    }

    private function generatedCode()
    {
      # code...
      $this->code = (string)Uuid::uuid1();
    }

    public function getReferral($user, $program)
    {
      # code...
      return static::firstOrCreated([
        'user_id' => $user->id,
        'referral_program_id' => $program->id
      ]);
    }

    public function getLinkAttribute()
    {
      # code...
      return url($this->program->uri).'?ref=' .$this->code;
    }

    public function user()
    {
      # code...
      return $this->belongsTo(User::class);
    }

    public function program()
    {
      # code...
      return $this->bellongsTo(RefferalProgram::class, 'referral_program_id');
    }

    public function relationsips()
    {
      # code...
      return $this->hasMany(ReferralRelationship::class);
    }

}
