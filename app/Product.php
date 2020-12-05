<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','title','image_url','price','description','status'];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
