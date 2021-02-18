<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'flat_id',
        'photo_name',
        'path',
        'photo_description',
    ];

    public function Flat()
    {
        return $this->hasOne(Flat::class);
    }
}
