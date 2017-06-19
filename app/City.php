<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

      protected $fillable = [
        'city_name','city_desc', 'city_lat', 'city_long'
    ];
}
