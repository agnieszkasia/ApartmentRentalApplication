<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        'floor_number',
    ];

    public function Flat()
    {
        return $this->belongsToMany(Flat::class);
    }
}
