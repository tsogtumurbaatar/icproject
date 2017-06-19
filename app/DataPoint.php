<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPoint extends Model
{
    protected $table = 'datapoint';
    protected $fillable = ['data_point','indicator_id','factor_id', 'segment_id','city_id'];
}
