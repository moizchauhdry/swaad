<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = [
        'average_rating', 'reviews_count'
    ];
    
    protected $fillable = ['category_id', 'title', 'title_gr', 'image_url', 'price', 'description', 'description_gr', 'status', 'view_count', 'spice_level','status'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'product_id');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->reviews()->avg('rating'), 1);
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }

}
