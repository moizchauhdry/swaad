<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'tracking_id', 
        'gross_total',
        'order_tip',
        'delivery_time',
        'delivery_date',
        'net_total',
        'coupon_code',
        'coupon_discount_amount',
        'order_status',
        'order_notes',
        'payment_status',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
