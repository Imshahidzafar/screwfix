<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    
    protected $connection = 'mongodb';
    protected $collection = 'companies';
    
    protected $fillable = [
        'country_id', 'state_id','city_id','name','phone','address','cr_number',
        'cr_registration','cr_expiry','vatin_number','vatin_registration','vatin_expiry'
    ];
}
