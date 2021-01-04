<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','product_id','order_id','rating','comment'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
