<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title','image_url','type','status'];
}
