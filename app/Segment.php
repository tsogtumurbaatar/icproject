<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'segments';
    protected $fillable = ['segment_name','segment_desc','factor_id'];

 }
