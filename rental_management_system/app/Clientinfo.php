<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientinfo extends Model
{
    protected $fillable = [
        'user_id',
         'name',
        'phone',
    ];
}
