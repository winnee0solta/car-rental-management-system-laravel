<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicledriver extends Model
{
    protected $fillable = [
        'vehicle_id',
        'driver_id', 
    ];
}
