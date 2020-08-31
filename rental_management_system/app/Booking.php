<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'driver_id',
        'name',
        'phone',
        'travel_date_from',
        'travel_date_to',
        'note',
        'payement_completed',
    ];
 
}  