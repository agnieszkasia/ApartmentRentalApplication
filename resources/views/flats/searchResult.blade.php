@extends('layouts.app2')
<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
@section('content')
    <div class="ml-4">
    <div class="">
        <div class="cards-header">WYSZUKANE OGŁOSZENIA</div>
        <div class="d-flex ">
            <div class="col-3 shadow ">
                <form action="/search/flats" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mr-2">
                        <div class="row justify-content">
                                <label for="city_id" class="col-md-6 mt-4">Miasto</label>
                                <select id="city_id" class="col-md-6 mt-3 form-control" name="city_id">
                                    @foreach(\App\City::all() as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                    @endforeach
                                </select>

                                <label for="district_id" class="col-md-6 mt-4">Dzielnica</label>
                                <select id="district_id" class="col-md-6 mt-3 form-control" name="district_id">
                                    <option ></option>
                                    @foreach(\App\District::all() as $district)
                                        <option value="{{$district->id}}">{{$district->district_name}}</option>
                                    @endforeach
                                </select>

                            <label for="number_of_tenants" class="col-md-6 mt-4">Liczba lokatorów</label>
                            <input id="number_of_tenants" type="number" min="1"  max="20"  class="col-md-6 mt-3 form-control " name="number_of_tenants" >

                            <label for="flat_area" class="col-md-6 mt-4">Powierzchnia (m2)</label>
                            <input id="flat_area" type="number" class="col-md-6 mt-3 form-control " name="flat_area" >

                            <label for="available_from" class="col-md-6 mt-4">Dostepne Od</label>
                            <input id="available_from" type="date" min="<?php echo $today; ?>" class="col-md-6 mt-3 form-control " name="available_from" >

                            <label for="floor_id" class="col-md-6 mt-4">Piętro</label>
                            <select id="floor_id" class="col-md-6 mt-3 form-control" name="floor_id">
                                <option ></option>
                                @foreach(\App\Floor::all() as $floor)
                                    <option value="{{$floor->id}}">{{$floor->floor_number}}</option>
                                @endforeach
                            </select>

                            <label for="number_of_rooms_id" class="col-md-6 mt-4">Liczba pokoi</label>
                            <select id="number_of_rooms_id" class="col-md-6 mt-3 form-control" name="number_of_rooms_id">
                                <option ></option>
                                @foreach(\App\NumberOfRooms::all() as $numberofrooms)
                                    <option value="{{$numberofrooms->id}}">{{$numberofrooms->number_of_rooms}}</option>
                                @endforeach
                            </select>

                            <label for="parking_place_id" class="col-md-6 mt-4">Miejsce parkingowe</label>
                            <select id="parking_place_id" class="col-md-6 mt-3 form-control" name="parking_place_id">
                                <option ></option>
                                @foreach(\App\ParkingPlace::all() as $parking)
                                    <option value="{{$parking->id}}">{{$parking->type_of_parking_place}}</option>
                                @endforeach
                            </select>

                            <label for="number_of_parking_place" class="col-md-6 mt-4">Liczba miejsc parkingowych</label>
                            <input id="number_of_parking_place" type="number" min="0" class="col-md-6 mt-3 form-control " name="number_of_parking_place" >

                            <div class="cards-header">Informacje o budynku</div>
                            <label for="type_of_building_id" class="col-md-6 mt-4">Rodzaj zabudowy</label>
                                <select id="type_of_building_id" class="col-md-6 mt-3 form-control" name="type_of_building_id">
                                    <option ></option>
                                    @foreach(\App\TypeOfBuilding::all() as $typeOfBuilding)
                                        <option value="{{$typeOfBuilding->id}}">{{$typeOfBuilding->type_of_building}}</option>
                                    @endforeach
                                </select>

                            <label for="ground_floor_flats" class="col-md-6 mt-4">Liczba mieszkan na pietrze</label>
                            <input id="ground_floor_flats" type="number"  class="col-md-6 mt-3 form-control " name="ground_floor_flats" >

                            <label for="number_of_floors" class="col-md-6 mt-4">Liczba pieter w budynku</label>
                            <input id="number_of_floors" type="number"  class="col-md-6 mt-3 form-control " name="number_of_floors" >

                            <label for="heating_id" class="col-md-6 mt-4">Ogrzewanie</label>
                            <select id="heating_id" class="col-md-6 mt-3 form-control" name="heating_id">
                                <option ></option>
                                @foreach(\App\Heating::all() as $heating)
                                    <option value="{{$heating->id}}">{{$heating->type_of_heating}}</option>
                                @endforeach
                            </select>

                            <label for="rubbish" class="col-md-6 mt-4">Rodzaj utylizacji śmieci</label>
                            <input id="rubbish" type="text" class="col-md-6 mt-3 form-control " name="rubbish" >




                                <label for="rent" class="col-md-6 mt-4">Cena wynajmu</label>
                                <input id="rent" type="text" min="0" class="col-md-3 mt-3 form-control " name="rent" placeholder="od" >
                                <input id="rent" type="text" min="0" class="col-md-3 mt-3 form-control " name="rent" placeholder="do">

                                <label for="deposit" class="col-md-6 mt-4">Kaucja</label>
                                <input id="deposit" type="text"  min="0" class="col-md-3 mt-3 form-control " name="deposit" placeholder="od">
                                <input id="deposit" type="text"  min="0" class="col-md-3 mt-3 form-control " name="deposit" placeholder="do">

                                <label for="media_fees" class="col-md-6 mt-4">Oplaty za media</label>
                                <input id="media_fees" type="text"  min="0" class="col-md-3 mt-3 form-control " name="media_fees" placeholder="od">
                                <input id="media_fees" type="text"  min="0" class="col-md-3 mt-3 form-control " name="media_fees" placeholder="do">

                                <label for="additional_fees" class="col-md-6 mt-4">Oplaty dodatkowe</label>
                                <input id="additional_fees" type="text" min="0" class="col-md-3 mt-3 form-control " name="additional_fees" placeholder="od">
                                <input id="additional_fees" type="text" min="0" class="col-md-3 mt-3 form-control " name="additional_fees" placeholder="do">



                            @foreach(\App\Media::all() as $media)
                                    <label for="$media->media_name" class="col-md-6 mt-4">{{$media->media_name}}</label>
                                    <input id="$media->media_name" type="checkbox" class="col-md-6 mt-3 form-control " name="$media->media_name" >
                            @endforeach




                                <label for="elevator" class="col-md-6 mt-4">Winda</label>
                                <input id="elevator" type="checkbox" value="1" class="col-md-6 mt-3 form-control" autocomplete="0" name="elevator" >

                                <label for="number_of_lifts" class="col-md-6 mt-4">Liczba wind w budynku</label>
                                <input id="number_of_lifts" type="number" class="col-md-6 mt-3 form-control " name="number_of_lifts" >


                                <label for="flat_direction" class="col-md-6 mt-4">Kierunek mieszkania</label>
                                <input id="flat_direction" type="text" class="col-md-6 mt-3 form-control " name="flat_direction" >

                                <label for="brightness_of_flat" class="col-md-6 mt-4">Jasność mieszkania</label>
                                <input id="brightness_of_flat" type="text" class="col-md-6 mt-3 form-control " name="brightness_of_flat" >

                                <label for="sublet_permission" class="col-md-6 mt-4">Zgoda na podnajem</label>
                                <input id="sublet_permission" type="checkbox" value="1" class="col-md-6 mt-3 form-control " name="sublet_permission" >

                                <label for="family_with_children" class="col-md-6 mt-4">Rodzina z dziecmi</label>
                                <input id="family_with_children" type="checkbox" value="1" class="col-md-6 mt-3 form-control " name="family_with_children" >

                                <label for="animals" class="col-md-6 mt-4">Zwierzeta</label>
                                <input id="animals" type="checkbox" value="1" class="col-md-6 mt-3 form-control " name="animals" >

                                <label for="smoking_person" class="col-md-6 mt-4">Osoba palaca</label>
                                <input id="smoking_person" type="checkbox" value="1" class="col-md-6 mt-3 form-control " name="smoking_person" >

                                <label for="balcony" class="col-md-6 mt-4">Balkon</label>
                                <input id="balcony" type="checkbox" value="1" class="col-md-6 mt-3 form-control " name="balcony" >


                    </div>
                        <button class="mb-4 mt-4 btn btn-primary">Wyszukaj</button>
                    </div>
                </form>
            </div>
            <div class="col-8 ml-4 shadow">
                @foreach(\App\Flat::all() as $flat)
                    @if(isset($table) and $flat->user_id != auth()->user()->id)
                    @foreach($table as $item)
                        <div class="d-md-flex">
                                @if($flat->id == $item)
                                    <div class="col-md-3">
                                    @foreach(\App\Photo::all() as $photo)
                                        @if($photo->flat_id == $flat->id)
                                            <img src="/images/photos/{{$photo->photo_name}}" class="square-image"/>
                                        @endif
                                    @endforeach
                                    </div>
                                    <div class="col-md-9">
                                        <div class=" d-md-flex justify-content-between">
                                            @foreach(\App\City::all() as $city)
                                                @if($city->id == $flat->city_id)
                                                    <a href="/flat/{{$flat->id }}" class="ml-2 mt-2 text-left">
                                                        <h4>{{$city->city_name}},
                                                            @foreach(\App\District::all() as $district)
                                                                @if($district->id == $flat->district_id)
                                                                    {{$district->district_name}}
                                                                @endif
                                                            @endforeach
                                                        </h4>
                                                    </a>
                                                @endif
                                            @endforeach
                                            @can ('update', $user)
                                                @if($flat->visibility == 1)
                                                    (To ogłoszenie jest nieaktywne)
                                                @endif
                                                <div class="d-flex justify-content-between float-right">
                                                    <div><a href="/flat/{{ $flat->id }}/edit" class="mr-1 ml-1 btn-primary btn">Edytuj</a></div>
                                                    <div><a href="/rentalhistory/{{ $flat->id }}" class="mr-1 ml-1 btn-primary btn">Historia wynajmu</a></div>
                                                </div>
                                            @endcan

                                                @cannot ('update', $flat)
                                                    <div class="d-flex justify-content-between float-right">
                                                        <follow-button flat-id="{{$flat->id}}" follows="{{$follows}}"></follow-button>
                                                        <div><a class=" mr-1 ml-1 btn btn-primary " href="/rent/{{$flat->id}}" >Wynajmij</a></div>
                                                    </div>
                                                @endcannot
                                        </div>
                                        <div class="ml-2">Cena: {{$flat->rent}}</div>
                                        <div class="ml-2">Powierzchnia(m2): {{$flat->flat_area}}</div>
                                        <div class="ml-2">Dostępne od: {{$flat->available_from}}</div>
                                        <div class="ml-2">Wystawione przez:
                                            @foreach(\App\User::all() as $user)
                                                @if($user->id == $flat->user_id)
                                                    <a href="/profile/{{$flat->user_id}}">{{$user->login}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                        </div>
                    @endforeach
                    @endif
                @endforeach
            </div>
        </div>

    </div>
    </div>
@endsection
