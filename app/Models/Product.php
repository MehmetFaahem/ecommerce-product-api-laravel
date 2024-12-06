<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'uuid', 'name', 'description', 'sku', 
        'categories', 'images', 'main_image', 
        'reviews', 'pricing', 'sizes', 
        'colors', 'stock', 'delivery', 
        'outstanding_features', 'washing_instructions', 
        'specifications', 'shipping'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->uuid = (string) Str::uuid();
        });
    }

    // Cast JSON columns
    protected $casts = [
        'categories' => 'array',
        'images' => 'array',
        'main_image' => 'array',
        'reviews' => 'array',
        'pricing' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
        'stock' => 'array',
        'delivery' => 'array',
        'outstanding_features' => 'array',
        'washing_instructions' => 'array',
        'specifications' => 'array',
        'shipping' => 'array'
    ];
}