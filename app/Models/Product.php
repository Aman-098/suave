<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'image',
        'description',
        'specification',
        'price',
        'badge',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
        
    }
}
