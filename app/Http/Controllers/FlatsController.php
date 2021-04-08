<?php

namespace App\Http\Controllers;

use App\Flat;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysqli;

class FlatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function create(Flat $flat)
    {
        $flat->id = $flat->getNextId();
        return view('flats.create', compact('flat'));
    }

    public function edit(Flat $flat)
    {
        return view('flats.edit', compact('flat'));
    }

    public function store(Flat $flat,User $user, Request $request, Photo $photoTable)
    {
        $flat_id = $request->input('flat_id');
        if ($request->hasFile('img'))
        {
            $photo_array = $request->file('img');
            $array_length = count($photo_array);

            for ($i=0; $i<$array_length;$i++)
            {
                $photo_ext = $photo_array[$i]->getClientOriginalExtension();
                $new_photo_name = rand(123456,999999).".".$photo_ext;
                $destination_path = public_path('/images/photos');
                $photo_array[$i]->move($destination_path, $new_photo_name);

                $table = new $photoTable;
                $table->photo_name = $new_photo_name;
                $table->flat_id = $flat_id;
                $table->save();

            }

            //utworzenie tablicy danych
            $data = request()->validate([
                'street' => ['string', 'max:191'],
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
                'environment_description' =>['string', 'max:191'],
                'sublet_permission' =>['string', 'max:1'],
                'available_from' =>['string',],
                'city_id' =>['string', 'max:1', 'required'],
                'district_id' =>['string', 'max:1'],
                'type_of_building_id' =>['string', 'max:1'],
                'floor_id' =>['string', 'max:1'],
                'heating_id' =>['string', 'max:1'],
                'parking_place_id' =>['string', 'max:1'],
                'number_of_rooms_id'=>['string', 'max:1'],
                'visibility'=>['string', 'max:1'],
                'rent'=>['string', 'max:11'],
                'additional_fees'=>['string', 'max:11'],
                'deposit'=>['string', 'max:11'],
                'media_fees'=>['string', 'max:11'],
                'description'=>['string'],
                'number_of_parking_place'=>['string', 'max:11'],
            ]);
            //odwołanie do funckji 'create'
            auth()->id()->flats()->create($data);
            dd($data);
            //wyświetlenie widoku ogłoszeń
            return view('flats.showAll', compact('user', 'flat')) ;
        }

        else {
            return back()->with('msg', 'Nie wybrano żadnego pliku, wybierz zdjęcia do dodania');
        }
    }

    public function show(Flat $flat)
    {
        $users = auth()->user()->pluck('id');
        $follows = (auth()->user()) ? auth()->user()->following->contains($flat->id) : false;

        return view('flats.show', compact('flat', 'follows'));
    }


    public function showAll(Flat $flat, User $user)
    {
        $users = auth()->user()->pluck('id');
        $follows = (auth()->user()) ? auth()->user()->following->contains($flat->id) : false;

        return view('flats.showAll', compact( 'user', 'follows'));
    }

    public function showAllInactive(Flat $flat, User $user)
    {
        $users = auth()->user()->pluck('id');
        $follows = (auth()->user()) ? auth()->user()->following->contains($flat->id) : false;

        return view('flats.showAllInactive', compact( 'user', 'follows'));
    }

    public function showFollowing(User $user, Flat $flat)
    {
        $users = auth()->user()->pluck('id');
        $follows = (auth()->user()) ? auth()->user()->following->contains($flat->id) : false;
        return view('flats.showFollowing', compact('flat', 'follows', 'user'));
    }

    public function update(Flat $flat)
    {
        $data = request()->validate([
            'street' => ['string', 'max:191'],
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
            'environment_description' =>['string', 'max:191'],
            'sublet_permission' =>['string', 'max:1'],
            'available_from' =>['string',],
            'city_id' =>['string', 'max:1', 'required'],
            'district_id' =>['string', 'max:1'],
            'type_of_building_id' =>['string', 'max:1'],
            'floor_id' =>['string', 'max:1'],
            'heating_id' =>['string', 'max:1'],
            'parking_place_id' =>['string', 'max:1'],
            'number_of_rooms_id'=>['string', 'max:1'],
            'visibility'=>['string', 'max:1'],
            'rent'=>['string', 'max:11'],
            'additional_fees'=>['string', 'max:11'],
            'deposit'=>['string', 'max:11'],
            'media_fees'=>['string', 'max:11'],
            'description'=>['string'],
            'number_of_parking_place'=>['string', 'max:11'],
        ]);
        $flat->update($data);
        return redirect("/flat/{$flat->id}");
    }

    public function search(Flat $flat)
    {


        return view('flats.search', compact('flat'));
    }

}
