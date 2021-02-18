<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $fillable = [
        'place_name',
        'place_description',
        'distance',
    ];

}
