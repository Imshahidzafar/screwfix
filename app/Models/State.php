<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class State extends Eloquent
{	   protected $connection = 'mongodb';
    protected $collection = 'states';
     protected $fillable = [
        'name', 'state_id'
    ];
}
