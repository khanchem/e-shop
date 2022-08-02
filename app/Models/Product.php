<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'long_desc',
        'short_desc',
        'product_qty',
        'selling_price',

        'discount_price',
        'product_slug',

        'product_tag',

        'product_code',
        'category_id',

        'brand_id',
        'latest',
        'feature',



        'status',
        'created_at',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
