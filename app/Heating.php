<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heating extends Model
{
    protected $fillable = [
        'type_of_heating',
    ];

    public function Flat()
    {
        return $this->belongsToMany(Flat::class);
    }
}
