<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded   = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    public function wishlistItems()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
