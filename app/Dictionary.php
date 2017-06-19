<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'diction_data';

      protected $fillable = [
        'indicator_id','range1_min','range1_max','range2_min','range2_max','range3_min','range3_max','range4_min','range4_max','range5_min','range5_max',
    ];
}
