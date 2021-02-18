@extends('layouts.app')

@section('content')


    <div class="container mt-5 mb-5">
        <div class="cards shadow mt-4">
                    <div class="cards-header d-flex justify-content-between">
                        <div>Tytul</div>
                    </div>
                    <div class="card-body">
                            <form action="/flat/{{ $flat->id }}" enctype="multipart/form-data" method="post">
                                @csrf

                                @method('PATCH')


                                <div class="row justify-content">
                                    <div class="col-6 row">
                                        <label for="street" class="col-6 mt-4">Ulica</label>
                                        <input id="street" type="text" class="col-6 mt-3 form-control " name="street" value="{{ old('street') ?? $flat->street}}" >
                                    </div>
                                    <div class="col-6 row">
                                        <label for="number_of_tenants" class="col-6 mt-4">Liczba lokatorów</label>
                                        <input id="number_of_tenants" type="number" min="1"  max="20" class="col-6 mt-3 form-control " name="number_of_tenants" value="{{ old('number_of_tenants') ?? $flat->number_of_tenants}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="flat_area" class="col-6 mt-4">Powierzchnia (m2)</label>
                                        <input id="flat_area" type="number" class="col-6 mt-3 form-control " name="flat_area" value="{{ old('flat_area') ?? $flat->flat_area}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="elevator" class="col-6 mt-4">Winda</label>
                                        <input id="elevator" type="checkbox" class="col-6 mt-3 form-control" name="elevator" value="{{ old('elevator') ?? $flat->elevator}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="garage" class="col-6 mt-4">Garaż</label>
                                        <input id="garage" type="checkbox" class="col-6 mt-3 form-control " name="garage" value="{{ old('garage') ?? $flat->garage}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="rubbish" class="col-6 mt-4">Śmieci</label>
                                        <input id="rubbish" type="text" class="col-6 mt-3 form-control " name="rubbish" value="{{ old('rubbish') ?? $flat->rubbish}}">
                                    </div>

                                    <div class="col-6 row">
                                        <label for="balcony" class="col-6 mt-4">Balkon</label>
                                        @if($flat->balcony != 1)
                                        <input id="balcony" type="checkbox" class="col-6 mt-3 form-control " name="balcony" value="1" unchecked>
                                        @endif
                                        @if($flat->balcony == 1)
                                            <input id="balcony" type="checkbox" class="col-6 mt-3 form-control " name="balcony" value="0" checked>
                                        @endif
                                    </div>


                                    <div class="col-6 row">
                                        <label for="ground_floor_flats" class="col-6 mt-4">Liczba Mieszkan Na Pietrze</label>
                                        <input id="ground_floor_flats" type="number" class="col-6 mt-3 form-control " name="ground_floor_flats" value="{{ old('ground_floor_flats') ?? $flat->ground_floor_flats}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="number_of_floors" class="col-6 mt-4">Liczba pięter w budynku</label>
                                        <input id="number_of_floors" type="number" class="col-6 mt-3 form-control " name="number_of_floors" value="{{ old('number_of_floors') ?? $flat->number_of_floors}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="animals" class="col-6 mt-4">Zwierzeta</label>
                                        <input id="animals" type="checkbox"  class="col-6 mt-3 form-control " name="animals" value="{{ old('animals') ?? $flat->animals}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="family_with_children" class="col-6 mt-4">RodzinaZDziecmi</label>
                                        <input id="family_with_children" type="checkbox" class="col-6 mt-3 form-control " name="family_with_children" value="{{ old('family_with_children') ?? $flat->family_with_children}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="smoking_person" class="col-6 mt-4">Osoba Palaca</label>
                                        <input id="smoking_person" type="checkbox" class="col-6 mt-3 form-control " name="smoking_person" value="{{ old('smoking_person') ?? $flat->smoking_person}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="flat_direction" class="col-6 mt-4">Kierunek Mieszkania</label>
                                        <input id="flat_direction" type="text" class="col-6 mt-3 form-control " name="flat_direction" value="{{ old('flat_direction') ?? $flat->flat_direction}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="brightness_of_flat" class="col-6 mt-4">Jasnosc Mieszkania</label>
                                        <input id="brightness_of_flat" type="text" class="col-6 mt-3 form-control " name="brightness_of_flat" value="{{ old('brightness_of_flat') ?? $flat->brightness_of_flat}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="number_of_lifts" class="col-6 mt-4">Liczba Wind</label>
                                        <input id="number_of_lifts" type="number"  class="col-6 mt-3 form-control " name="number_of_lifts" value="{{ old('number_of_lifts') ?? $flat->number_of_lifts}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="description_of_environment" class="col-6 mt-4">Opis Otoczenia</label>
                                        <input id="description_of_environment" type="text" class="col-6 mt-3 form-control " name="description_of_environment" value="{{ old('description_of_environment') ?? $flat->description_of_environment}}">
                                    </div>
                                    <div class="col-6 row">
                                        <label for="sublet_permission" class="col-6 mt-4">Zgoda Na Podnajem</label>
                                        <input id="sublet_permission" type="checkbox" class="col-6 mt-3 form-control " name="sublet_permission" value="{{ old('sublet_permission') ?? $flat->sublet_permission}}">
                                    </div>

                                    <div class="col-6 row">
                                        <label for="available_from" class="col-6 mt-4">Dostepne Od</label>
                                        <input id="available_from" type="date" class="col-6 mt-3 form-control " name="available_from" value="{{ old('available_from') ?? $flat->available_from}}">
                                    </div>

                                    <div class="col-6 row">
                                        <label for="city_id" class="col-6 mt-4">Miasto</label>
                                        <select id="city_id" class="col-6 mt-3 form-control" name="city_id">
                                            <option value="{{ old('city_id') ?? $flat->city_id}}"></option>
                                            @foreach(\App\City::all() as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 row">
                                        <label for="district_id" class="col-6 mt-4">Dzielnica</label>
                                        <select id="district_id" class="col-6 mt-3 form-control" name="district_id">
                                            @foreach(\App\District::all() as $district)
                                                <option value="{{$district->id}}">{{$district->district_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6 row">
                                        <label for="price_id" class="col-6 mt-4">Ceny</label>
                                        <input id="price_id" type="number" class="col-6 mt-3 form-control " name="price_id" value="{{ old('price_id') ?? $flat->price_id}}">
                                    </div>

                                    <div class="col-6 row">
                                        <label for="type_of_building_id" class="col-6 mt-4">RodzajZabudowy</label>
                                        <select id="type_of_building_id" class="col-6 mt-3 form-control" name="type_of_building_id">
                                            @foreach(\App\TypeOfBuilding::all() as $typeOfBuilding)
                                                <option value="{{$typeOfBuilding->id}}">{{$typeOfBuilding->type_of_building}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 row">
                                        <label for="floor_id" class="col-6 mt-4">Pietro</label>
                                        <select id="floor_id" class="col-6 mt-3 form-control" name="floor_id">
                                            @foreach(\App\Floor::all() as $floor)
                                                <option value="{{$floor->id}}">{{$floor->floor_number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 row">
                                        <label for="heating_id" class="col-6 mt-4">Ogrzewanie</label>
                                        <select id="heating_id" class="col-6 mt-3 form-control" name="heating_id">
                                            @foreach(\App\Heating::all() as $heating)
                                                <option value="{{$heating->id}}">{{$heating->type_of_heating}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 row">
                                        <label for="parking_place_id" class="col-6 mt-4">Miejsce parkingowe</label>
                                        <select id="parking_place_id" class="col-6 mt-3 form-control" name="parking_place_id">
                                            @foreach(\App\ParkingPlace::all() as $parkingPlace)
                                                <option value="{{$parkingPlace->id}}">{{$parkingPlace->number_of_parking_place}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 row">
                                        <label for="number_of_rooms_id" class="col-6 mt-4">Liczba pokoi</label>
                                        <select id="number_of_rooms_id" class="col-6 mt-3 form-control" name="number_of_rooms_id">
                                            @foreach(\App\NumberOfRooms::all() as $numberOfRooms)
                                                <option value="{{$numberOfRooms->id}}">{{$numberOfRooms->number_of_rooms}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6 row">
                                        <label for="environment_description" class="col-6 mt-4">Opis otoczenia</label>
                                        <input id="environment_description" type="text" class="col-6 mt-3 form-control " name="environment_description" value="{{ old('environment_description') ?? $flat->environment_description}}">
                                    </div>

                                    <div class="col-6 row">
                                        <label for="visibility" class="col-6 mt-4">Ukryj ogłoszenie</label>
                                        <input id="visibility" type="checkbox" class="col-6 mt-3 form-control " name="visibility" value="1">
                                    </div>

                                </div>
                                <button class="  mt-4 btn btn-primary">Zapisz zmiany</button>
                            </form>
                </div>
                </div>
    </div>

@endsection