<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'vehicle',
        'age_driver',
        'pickup_date',
        'return_date',
        'phone',
        'message'

    ];
}
