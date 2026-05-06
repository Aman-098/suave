<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'phone',
        'fleet_name',
        'pickup_date',
        'return_date',
        'message',
        'status'
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'return_date' => 'date',
    ];
}
