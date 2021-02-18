<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'second_name',
        'last_name',
        'birth_date',
        'place',
        'postcode',
        'login',
        'gender',
        'phone_number',
        'email',
        'password',
        'type_of_user',
        'blocked',
        'inactive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function following()
    {
        return $this->belongsToMany(Flat::class);
    }

    public function flats()
    {
        return $this->hasMany(Flat::class);
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }


}
