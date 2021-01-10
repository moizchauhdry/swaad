<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteConfiguration extends Model
{
    protected $fillable = ['address', 'phone', 'email','store_timing'];
}
