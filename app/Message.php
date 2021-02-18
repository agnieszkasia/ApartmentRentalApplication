<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content_of_message',
        'user_to',
        'user_from',
        'seen',
        'flat_id',
        'blocked',
        'inactive',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
