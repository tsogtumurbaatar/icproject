<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicators';
    protected $fillable = ['indicator_name','indicator_desc','factor_id', 'segment_id'];
}
