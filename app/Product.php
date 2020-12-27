<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','title','title_gr','image_url','price','description','description_gr','status','view_count'];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

}
