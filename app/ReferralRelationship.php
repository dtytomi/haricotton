<?php

namespace Haricotton;

use Illuminate\Database\Eloquent\Model;

class ReferralRelationship extends Model
{
    //
    protected $fillable = [
        'user_id', 'referral_link_id'
    ];
    
}
