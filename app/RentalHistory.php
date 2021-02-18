<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalHistory extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'since_when',
        'until_when',
        'user_id',
        'flat_id',
    ];

    public function flat()
    {
        $this->hasOne(Flat::class);
    }

    public function user()
    {
        $this->hasOne(User::class);
    }
}
