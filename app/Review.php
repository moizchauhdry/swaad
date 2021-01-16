<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{   
    protected $appends =['created_at_format'];
    protected $fillable = ['user_id', 'product_id', 'order_id', 'rating', 'comment','is_approved','created_at'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCreatedAtFormatAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
