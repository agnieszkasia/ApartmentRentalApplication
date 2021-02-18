<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumberOfRooms extends Model
{
    protected $fillable = [
        'number_of_rooms',
    ];

    public function Flat()
    {
        return $this->belongsToMany(Flat::class);
    }

}
