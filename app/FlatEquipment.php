<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlatEquipment extends Model
{
    protected $fillable = [
        'equipment_name',
        'equipment_description',
    ];

    public function flat()
    {
        return $this->belongsToMany(Flat::class,'flat_has', 'equipment_id','flat_id');
    }
}
