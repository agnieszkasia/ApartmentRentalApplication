@extends('layouts.app2')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="cards shadow mt-4">
            <div class="cards-header mb-3 justify-content-md-end">
                @can ('update', $flat)
                    @if($flat->visibility == 1)
                        (To ogłoszenie jest nieaktywne)
                    @endif
                    <div class="top-right"><a class="btn-primary btn" href="/flat/{{ $flat->id }}/edit">Edytuj ogłoszenie</a></div>
                @endcan
                @cannot ('update', $flat)
                        <follow-button flat-id="{{$flat->id}}" follows="{{$follows}}"></follow-button>
                        <div><a class="btn btn-primary mr-1 ml-1" href="/rent/{{$flat->id}}" >Wynajmij</a></div>
                @endcan
            </div>
            <div class="card-body">
                <div>
                    @foreach(\App\Photo::all() as $photo)
                        @if($photo->flat_id == $flat->id)
                            <div class="">
                                <img src="/images/photos/{{$photo->photo_name}}" class="square-image-big">
                            </div>
                        @endif
                    @endforeach
                </div>

                <div>
                    @foreach(\App\User::all() as $user)
                        @if($user->id == $flat->user_id)
                            <div class="col-md-6 d-flex">
                                <div class="col-6 mt-4">Ogłoszenie użytkownika</div>
                                <div class="col-6 mt-4"><a href="/profile/{{$user->id}}">{{$user->login}}</a></div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="row ">
                @if($flat->city_id != null)
                    <div class="col-md-4 d-flex">
                        <div class="col-md-6 mt-4">Miasto</div>
                        @foreach(\App\City::all() as $city)
                            @if($city->id == $flat->city_id)
                                <div class="col-md-6 mt-4">{{$city->city_name}}</div>
                            @endif
                        @endforeach
                    </div>
                @endif

                @if($flat->city_id != null)
                    <div class="col-md-4 d-flex">
                        <div class="col-md-6 mt-4">Dzielnica</div>
                        @foreach(\App\District::all() as $district)
                            @if($district->id == $flat->district_id)
                                <div class="col-md-6 mt-4">{{$district->district_name}}</div>
                            @endif
                        @endforeach
                    </div>
                @endif

                    @if($flat->street != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Ulica</div>
                            <div class="col-md-6 mt-4">{{$flat->street}}</div>
                        </div>
                    @endif

                    @if($flat->number_of_tenants != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Liczba lokatorów</div>
                            <div class="col-md-6 mt-4">{{$flat->number_of_tenants}}</div>
                        </div>
                    @endif

                    @if($flat->flat_area != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Powierzchnia(m2)</div>
                            <div class="col-md-6 mt-4">{{$flat->flat_area}}</div>
                        </div>
                    @endif

                    @if($flat->available_from != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Dostepne od</div>
                            <div class="col-md-6 mt-4">{{$flat->available_from}}</div>
                        </div>
                    @endif

                    @if($flat->floor_id != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Piętro</div>
                            @foreach(\App\Floor::all() as $floor)
                                @if($floor->id == $flat->floor_id)
                                    <div class="col-md-6 mt-4">{{$floor->floor_number}}</div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($flat->number_of_rooms_id != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Liczba pokoi</div>
                            @foreach(\App\NumberOfRooms::all() as $numberofrooms)
                                @if($numberofrooms->id == $flat->number_of_rooms_id)
                                    <div class="col-md-6 mt-4">{{$numberofrooms->number_of_rooms}}</div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($flat->parking_place_id != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Miejsce parkingowe</div>
                            @foreach(\App\ParkingPlace::all() as $parking)
                                @if($parking->id == $flat->parking_place_id)
                                    <div class="col-md-6 mt-4">{{$parking->number_of_parking_place}}</div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($flat->number_of_parking_place != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Liczba miejsc parkingowych</div>
                            <div class="col-md-6 mt-4">{{$flat->number_of_parking_place}}</div>
                        </div>
                    @endif

                    @if($flat->environment_description != null)
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6 mt-4">Opis otoczenia</div>
                            <div class="col-md-6 mt-4">{{$flat->environment_description}}</div>
                        </div>
                    @endif

                    @if($flat->type_of_building_id != null or $flat->ground_floor_flats != null or $flat->number_of_floors != null or $flat->heating_id != null or $flat->rubbish != null)
                    <div class="cards-header col-md-12">Informacje o budynku</div>
                    @endif

                    @if($flat->type_of_building_id != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Rodzaj zabudowy</div>
                            @foreach(\App\TypeOfBuilding::all() as $typeofbuilding)
                                @if($typeofbuilding->id == $flat->type_of_building_id)
                                    <div class="col-md-6 mt-4">{{$typeofbuilding->type_of_building}}</div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($flat->ground_floor_flats != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Liczba mieszkanń na piętrze</div>
                            <div class="col-md-6 mt-4">{{$flat->ground_floor_flats}}</div>
                        </div>
                    @endif

                    @if($flat->number_of_floors != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Liczba pieter w budynku</div>
                            <div class="col-md-6 mt-4">{{$flat->number_of_floors}}</div>
                        </div>
                    @endif

                    @if($flat->heating_id != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Ogrzewanie</div>
                            @foreach(\App\Heating::all() as $heating)
                                @if($heating->id == $flat->heating_id)
                                    <div class="col-md-6 mt-4">{{$heating->type_of_heating}}</div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($flat->rubbish != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Rodzaj utylizacji śmieci</div>
                            <div class="col-md-6 mt-4">{{$flat->rubbish}}</div>
                        </div>
                    @endif

                    @if($flat->price_id != null or $flat->price_id != null or $flat->price_id != null or $flat->price_id != null)
                        <div class="cards-header col-md-12">Opłaty</div>
                    @endif

                    @if($flat->rent != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Cena wynajmu</div>
                            <div class="col-md-6 mt-4">{{$flat->rent}}</div>
                        </div>
                    @endif

                    @if($flat->additional_fees != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Opłaty dodatkowe</div>
                            <div class="col-md-6 mt-4">{{$flat->additional_fees}}</div>
                        </div>
                    @endif

                    @if($flat->deposit != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Kaucja</div>
                            <div class="col-md-6 mt-4">{{$flat->deposit}}</div>
                        </div>
                    @endif

                    @if($flat->media_fees != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Oplaty za media</div>
                            <div class="col-md-6 mt-4">{{$flat->media_fees}}</div>
                        </div>
                    @endif


                    <div class="cards-header col-md-12">Dodatkowe informacje</div>

                    @if($flat->balcony != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Balkon</div>
                            <div class="col-md-6 mt-4">{{$flat->balcony}}</div>
                        </div>
                    @endif

                    @if($flat->elevator != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Winda</div>
                            <div class="col-md-6 mt-4">{{$flat->elevator}}</div>
                        </div>
                    @endif

                    @if($flat->garage != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Udogodnienia dla niepełnosprawnych</div>
                            <div class="col-md-6 mt-4">{{$flat->garage}}</div>
                        </div>
                    @endif

                    @if($flat->number_of_lifts != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Liczba wind</div>
                            <div class="col-md-6 mt-4">{{$flat->number_of_lifts}}</div>
                        </div>
                    @endif

                    @if($flat->family_with_children != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Rodzina z dziecmi</div>
                            <div class="col-md-6 mt-4">{{$flat->family_with_children}}</div>
                        </div>
                    @endif

                    @if($flat->smoking_person != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Osoba paląca</div>
                            <div class="col-md-6 mt-4">{{$flat->smoking_person}}</div>
                        </div>
                    @endif

                    @if($flat->animals != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Zwierzęta</div>
                            <div class="col-md-6 mt-4">{{$flat->animals}}</div>
                        </div>
                    @endif

                    @if($flat->sublet_permission != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Zgoda na podnajem</div>
                            <div class="col-md-6 mt-4">{{$flat->sublet_permission}}</div>
                        </div>
                    @endif

                    @if($flat->flat_direction != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Kierunek mieszkania</div>
                            <div class="col-md-6 mt-4">{{$flat->flat_direction}}</div>
                        </div>
                    @endif

                    @if($flat->brightness_of_flat != null)
                        <div class="col-md-4 d-flex">
                            <div class="col-md-6 mt-4">Jasność mieszkania</div>
                            <div class="col-md-6 mt-4">{{$flat->brightness_of_flat}}</div>
                        </div>
                    @endif


                    <div class="cards-header col-md-12">Media</div>

                    @foreach(\App\Media::all() as $media)
                        @if($media->flat_id == $flat->id)
                            <div class="col-md-4 d-flex">
                                <div class="col-md-6 mt-4">{{$media->media_name}}</div>
                                <div class="col-md-6 mt-4">Tak</div>
                            </div>
                        @endif
                    @endforeach

                    <div class="cards-header col-md-12">Wyposażenie mieszkania</div>
                    @foreach(\App\FlatEquipment::all() as $equipment)
                        @if($equipment->flat_id == $flat->id)
                            <div class="col-md-4 d-flex">
                                <div class="col-md-6 mt-4">{{$equipment->equipment_name}}</div>
                            </div>
                        @endif
                    @endforeach

                    <div class="cards-header col-md-12">Wyposażenie łązienki</div>
                    @foreach(\App\BathroomEquipment::all() as $equipment)
                        @if($equipment->flat_id == $flat->id)
                            <div class="col-md-4 d-flex">
                                <div class="col-md-6 mt-4">{{$equipment->equipment_name}}</div>
                            </div>
                        @endif
                    @endforeach

                    <div class="cards-header col-md-12">Wyposażenie kuchni</div>
                    @foreach(\App\KitchenEquipment::all() as $equipment)
                        @if($equipment->flat_id == $flat->id)
                            <div class="col-md-4 d-flex">
                                <div class="col-md-6 mt-4">{{$equipment->equipment_name}}</div>
                            </div>
                        @endif
                    @endforeach

































                </div>
                @foreach($flat->flatEquipment as $id)
                {{$id->id}}
                @endforeach
            </div>
        </div>
    </div>

@endsection
