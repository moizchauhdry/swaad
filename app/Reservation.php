<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'people', 'date', 'time_of_day','message','user_id'];
}
