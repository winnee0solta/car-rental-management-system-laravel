<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [ 
        'image',
        'name',
        'phone',
        'address',
        'citizenship_no',
        'experience',
        'license',
        'status',
    ];
}
