<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class City extends Eloquent
{
    
     protected $connection = 'mongodb';
    protected $collection = 'cities';
    
    protected $fillable = [
        'name', 'country_id'
    ];
}
