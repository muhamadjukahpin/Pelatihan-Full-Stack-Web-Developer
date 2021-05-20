<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function order_item()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function size_items()
    {
        return $this->hasMany(SizeItem::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
