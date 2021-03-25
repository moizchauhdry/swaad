<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $appends =['created_at_format'];

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
        'created_at',
        'order_lang',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function getCreatedAtFormatAttribute(){
        return Carbon::parse($this->created_at)->format('d F,Y H:i:s');
    }
}
