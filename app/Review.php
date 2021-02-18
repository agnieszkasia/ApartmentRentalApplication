<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content_of_review',
        'number_of_stars',
        'user_about',
        'user_from',
        'blocked',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
