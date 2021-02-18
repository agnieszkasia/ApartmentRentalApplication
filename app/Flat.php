<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Flat extends Model
{
    protected $guarded = [];

    public function getNextId()
    {

        $statement = DB::select("show table status like 'flats'");
        $statement = array_map(function ($value) {
            return (array)$value;
        }, $statement);

        $next_id = $statement[0]['Auto_increment'];
        return $next_id;
    }

    protected $fillable = [
        'street',
        'number_of_tenants',
        'flat_area',
        'elevator',
        'garage',
        'rubbish',
        'balcony',
        'ground_floor_flats',
        'number_of_floors',
        'animals',
        'family_with_children',
        'smoking_person',
        'flat_direction',
        'brightness_of_flat',
        'number_of_lifts',
        'environment_description',
        'sublet_permission',
        'available_from',
        'city_id',
        'type_of_building_id',
        'floor_id',
        'heating_id',
        'number_of_rooms_id',
        'parking_place_id',
        'visibility',
        'rent',
        'additional_fees',
        'deposit',
        'media_fees',
        'description',
        'number_of_parking_place',
        'blocked',
    ];

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function distance()
    {
        return $this->hasOne(Distance::class);
    }

    public function floor()
    {
        return $this->hasOne(Floor::class);
    }

    public function heating()
    {
        return $this->hasOne(Heating::class);
    }

    public function inconvenience()
    {
        return $this->hasOne(Inconvenience::class);
    }

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }

    public function numbersOfRooms()
    {
        return $this->hasOne(NumberOfRooms::class);
    }

    public function parkingPlace()
    {
        return $this->hasOne(ParkingPlace::class);
    }

    public function typeOfBuilding()
    {
        return $this->hasOne(TypeOfBuilding::class);
    }

    public function rentalHistory()
    {
        return $this->belongsToMany(RentalHistory::class);
    }

    public function bathroomEquipment()
    {
        return $this->belongsToMany(BathroomEquipment::class,'bathroom_flat', 'flat_id','equipment_id');
    }

    public function flatEquipment()
    {
        return $this->belongsToMany(FlatEquipment::class,'flat_has', 'flat_id','equipment_id');
    }

    public function kitchenEquipment()
    {
        return $this->belongsToMany(KitchenEquipment::class,'kitchen_has', 'flat_id','equipment_id');
    }
}
