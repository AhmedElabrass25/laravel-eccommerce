<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected static function booted()
    {
        static::deleting(function ($category) {
            if ($category->isForceDeleting()) {
                $category->products()->forceDelete();
            } else {
                $category->products()->delete(); // 👈 soft delete للمنتجات
            }
        });

        static::restoring(function ($category) {
            $category->products()->withTrashed()->restore(); // 👈 restore معاها المنتجات
        });
    }
}
