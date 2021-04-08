<?php

namespace App\Http\Controllers;

use App\City;
use App\Flat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;

class SearchController extends Controller
{
    public function index(Flat $flat)
    {
        $conn = mysqli_connect('127.0.0.1','root' , '','kwadrat');

        $query = "SELECT * FROM cities ORDER BY city_name ASC";
        $result = mysqli_query($conn,$query);
        return view('flats.search', compact('flat', 'result'));
    }

    public function get(User $user, Request $request, Flat $flat)
    {
        $data = request()->validate([
            'number_of_tenants' =>['string', 'max:11'],
            'flat_area' =>['string', 'max:11'],
            'elevator' =>['string', 'max:1'],
            'garage' =>['string', 'max:1'],
            'rubbish' =>['string', 'max:1'],
            'balcony' =>['string', 'max:1'],
            'ground_floor_flats' =>['string', 'max:11'],
            'number_of_floors' =>['string', 'max:11'],
            'animals' =>['string', 'max:1'],
            'family_with_children' =>['string', 'max:1'],
            'smoking_person' =>['string', 'max:1'],
            'flat_direction' =>['string', 'max:191'],
            'brightness_of_flat' =>['string', 'max:191'],
            'number_of_lifts' =>['string', 'max:11'],
            'sublet_permission' =>['string', 'max:1'],
            'available_from' =>['string',],
            'city_id' =>['string', 'max:1', 'required'],
            'district_id' =>['string', 'max:1'],
            'type_of_building_id' =>['string', 'max:1'],
            'floor_id' =>['string', 'max:1'],
            'heating_id' =>['string', 'max:1'],
            'parking_place_id' =>['string', 'max:1'],
            'number_of_rooms_id'=>['string', 'max:1'],
            'rent'=>['string', 'max:11'],
            'additional_fees'=>['string', 'max:11'],
            'deposit'=>['string', 'max:11'],
            'media_fees'=>['string', 'max:11'],
            'number_of_parking_place'=>['string', 'max:11'],
        ]);


        $conn = mysqli_connect('127.0.0.1','root' , '','kwadrat');
        $sql = "SELECT * FROM flats WHERE city_id = {$data['city_id']}";
        if (isset($data['number_of_tenants'])){
            $sql .=" AND number_of_tenants = {$data['number_of_tenants']}";
        }
        if (isset($data['flat_area'])){
            $sql .=" AND flat_area = {$data['flat_area']}";
        }
        if (isset($data['elevator'])){
            $sql .=" AND elevator = {$data['elevator']}";
        }
        if (isset($data['rubbish'])){
            $sql .=" AND rubbish = {$data['rubbish']}";
        }
        if (isset($data['balcony'])){
            $sql .=" AND balcony = {$data['balcony']}";
        }
        if (isset($data['ground_floor_flats'])){
            $sql .=" AND ground_floor_flats = {$data['ground_floor_flats']}";
        }
        if (isset($data['number_of_floors'])){
            $sql .=" AND number_of_floors = {$data['number_of_floors']}";
        }
        if (isset($data['animals'])){
            $sql .=" AND animals = {$data['animals']}";
        }
        if (isset($data['family_with_children'])){
            $sql .=" AND family_with_children = {$data['family_with_children']}";
        }
        if (isset($data['smoking_person'])){
            $sql .=" AND smoking_person = {$data['smoking_person']}";
        }
        if (isset($data['flat_direction'])){
            $sql .=" AND flat_direction = {$data['flat_direction']}";
        }
        if (isset($data['brightness_of_flat'])){
            $sql .=" AND brightness_of_flat = {$data['brightness_of_flat']}";
        }
        if (isset($data['number_of_lifts'])){
            $sql .=" AND number_of_lifts = {$data['number_of_lifts']}";
        }
        if (isset($data['sublet_permission'])){
            $sql .=" AND sublet_permission = {$data['sublet_permission']}";
        }
        if (isset($data['available_from'])){
            $sql .=" AND available_from = {$data['available_from']}";
        }
        if (isset($data['type_of_building_id'])){
            $sql .=" AND type_of_building_id = {$data['type_of_building_id']}";
        }
        if (isset($data['floor_id'])){
            $sql .=" AND floor_id = {$data['floor_id']}";
        }
        if (isset($data['heating_id'])){
            $sql .=" AND heating_id = {$data['heating_id']}";
        }
        if (isset($data['parking_place_id'])){
            $sql .=" AND parking_place_id = {$data['parking_place_id']}";
        }
        if (isset($data['number_of_rooms_id'])){
            $sql .=" AND number_of_rooms_id = {$data['number_of_rooms_id']}";
        }
        if (isset($data['visibility'])){
            $sql .=" AND visibility = {$data['visibility']}";
        }
        if (isset($data['rent'])){
            $sql .=" AND rent = {$data['rent']}";
        }
        if (isset($data['additional_fees'])){
            $sql .=" AND additional_fees = {$data['additional_fees']}";
        }
        if (isset($data['deposit'])){
            $sql .=" AND deposit = {$data['deposit']}";
        }
        if (isset($data['media_fees'])){
            $sql .=" AND media_fees = {$data['media_fees']}";
        }
        if (isset($data['number_of_parking_place'])){
            $sql .=" AND number_of_parking_place = {$data['number_of_parking_place']}";
        }


        $table = [];
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

                for ($i = 0; $i < $num_rows ;$i++) {
                    $row = mysqli_fetch_array($result);
                    $table[$i] = $row['id'];
                }


        $follows = (auth()->user()) ? auth()->user()->following->contains($flat->id) : false;


        return view('flats.searchResult', compact('user', 'data', 'table', 'follows')) ;

    }

    public function show(City $city, Flat $flat)
    {

        return view('flats.searchResult' , compact('city', 'flat'));
    }

}
