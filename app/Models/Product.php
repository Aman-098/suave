<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        'category_id',
        'sort_order',
        'name',
        'slug',
        'image',
        'gallery_images',
        'rating',
        'description',
        'specification',
        'price',
        'badge',
        'status',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
        
    }
}
