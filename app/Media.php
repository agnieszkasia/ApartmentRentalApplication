<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'media_name',
    ];

    public function flats()
    {
        return $this->belongsToMany(Flat::class);
    }

}
