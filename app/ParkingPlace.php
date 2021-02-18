<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingPlace extends Model
{
    protected $fillable = [
        'type_of_parking_place',
    ];

    public function Flat()
    {
        return $this->belongsToMany(Flat::class);
    }
}
