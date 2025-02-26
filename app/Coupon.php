<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class,'user_coupons')->withTimestamps();
    }
}
