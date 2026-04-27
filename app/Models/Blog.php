<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
     protected $fillable=[
        'title',
        'author',
        'slug',
        'image',
        'description',
        'status'
    ];
}
