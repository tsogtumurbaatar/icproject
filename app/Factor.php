<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $table = 'factors';

      protected $fillable = [
        'factor_name','factor_desc',
    ];
}
