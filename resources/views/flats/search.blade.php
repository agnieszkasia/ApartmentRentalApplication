@extends('layouts.app')
<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<script>
    $(document).ready(function () {
        $('$city').on('change',function () {
            var cityID = $(this).val();
            if(cityID){
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.index') }}",
                    data: 'city_id='+cityID,
                    success: function (html) {
                        $('#district_id').html(html);
                    }
                });
            }else {
                $('#district_id').html('<option value="">Najpierw wybierz miasto</option>');
            }
        });
    });
</script>

@section('content')
    <div class="container mt-5 ">
    <div class="cards2 shadow mt-4 mb-5">
        <div class="cards-header mb-3">SZUKAJ OGŁOSZENIA</div>
        <div class="card-body">
            <div class="form-group">
                <form action="/search/flats" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row justify-content">
                        <div class="col-md-4 d-flex">
                            <label for="city_id" class="col-6 mt-4">Miasto</label>
                            <?php


                            ?>
                            <select id="city_id" class="col-6 mt-3 form-control" name="city_id">
                                    @if (count($result) >0)
                                        @foreach ($result as $row)
                                            <option value="{{$row->id}}"> {{$row->city_name}}</option>;
                                        @endforeach
                                    @else
                                            <option value="">Brak</option>';

                                    @endif
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="district_id" class="col-6 mt-4">Dzielnica</label>
                            <select id="district_id" class="col-6 mt-3 form-control" name="district_id">
                                <option value="" disabled selected id="district_id"></option>
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="number_of_tenants" class="col-6 mt-4">Liczba lokatorów</label>
                            <input id="number_of_tenants" type="number" min="1"  max="20"  class="col-6 mt-3 form-control " name="number_of_tenants" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="flat_area" class="col-6 mt-4">Powierzchnia (m2)</label>
                            <input id="flat_area" type="number" class="col-6 mt-3 form-control " name="flat_area" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="available_from" class="col-6 mt-4">Dostepne od</label>
                            <input id="available_from" type="date" min="<?php echo $today; ?>" class="col-6 mt-3 form-control " name="available_from" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="floor_id" class="col-6 mt-4">Piętro</label>
                            <select id="floor_id" class="col-6 mt-3 form-control" name="floor_id">
                                <option ></option>
                                @foreach(\App\Floor::all() as $floor)
                                    <option value="{{$floor->id}}">{{$floor->floor_number}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="number_of_rooms_id" class="col-6 mt-4">Liczba pokoi</label>
                            <select id="number_of_rooms_id" class="col-6 mt-3 form-control" name="number_of_rooms_id">
                                <option ></option>
                                @foreach(\App\NumberOfRooms::all() as $numberofrooms)
                                    <option value="{{$numberofrooms->id}}">{{$numberofrooms->number_of_rooms}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="parking_place_id" class="col-6 mt-4">Miejsce parkingowe</label>
                            <select id="parking_place_id" class="col-6 mt-3 form-control" name="parking_place_id">
                                <option ></option>
                                @foreach(\App\ParkingPlace::all() as $parking)
                                    <option value="{{$parking->id}}">{{$parking->type_of_parking_place}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="number_of_parking_place" class="col-6 mt-4">Liczba miejsc parkingowych</label>
                            <input id="number_of_parking_place" type="number" min="0" class="col-6 mt-3 form-control " name="number_of_parking_place" >
                        </div>

                        <div class="cards-header col-md-12">Informacje o budynku</div>
                        <div class="col-md-4 d-flex">
                            <label for="type_of_building_id" class="col-6 mt-4">Rodzaj zabudowy</label>
                            <select id="type_of_building_id" class="col-6 mt-3 form-control" name="type_of_building_id">
                                <option ></option>
                                @foreach(\App\TypeOfBuilding::all() as $typeOfBuilding)
                                    <option value="{{$typeOfBuilding->id}}">{{$typeOfBuilding->type_of_building}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="ground_floor_flats" class="col-6 mt-4">Liczba mieszkań na piętrze</label>
                            <input id="ground_floor_flats" type="number"  class="col-6 mt-3 form-control " name="ground_floor_flats" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="number_of_floors" class="col-6 mt-4">Liczba pieter w budynku</label>
                            <input id="number_of_floors" type="number"  class="col-6 mt-3 form-control " name="number_of_floors" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="heating_id" class="col-6 mt-4">Ogrzewanie</label>
                            <select id="heating_id" class="col-6 mt-3 form-control" name="heating_id">
                                <option ></option>
                                @foreach(\App\Heating::all() as $heating)
                                    <option value="{{$heating->id}}">{{$heating->type_of_heating}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="rubbish" class="col-6 mt-4">Rodzaj utlizacji śmieci</label>
                            <input id="rubbish" type="text" class="col-6 mt-3 form-control " name="rubbish" >
                        </div>

                        <div class="cards-header col-md-12">Opłaty</div>
                        <div class="col-md-4 d-flex">
                            <label for="rent" class="col-6 mt-4">Cena wynajmu</label>
                            <input id="rent" type="text" min="0" class="col-3 mt-3 form-control " name="rent" placeholder="od" >
                            <input id="rent" type="text" min="0" class="col-3 mt-3 form-control " name="rent" placeholder="do">
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="additional_fees" class="col-6 mt-4">Oplaty dodatkowe</label>
                            <input id="additional_fees" type="text" min="0" class="col-3 mt-3 form-control " name="additional_fees" placeholder="od">
                            <input id="additional_fees" type="text" min="0" class="col-3 mt-3 form-control " name="additional_fees" placeholder="do">
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="deposit" class="col-6 mt-4">Kaucja</label>
                            <input id="deposit" type="text"  min="0" class="col-3 mt-3 form-control " name="deposit" placeholder="od">
                            <input id="deposit" type="text"  min="0" class="col-3 mt-3 form-control " name="deposit" placeholder="do">
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="media_fees" class="col-6 mt-4">Oplaty za media</label>
                            <input id="media_fees" type="text"  min="0" class="col-3 mt-3 form-control " name="media_fees" placeholder="od">
                            <input id="media_fees" type="text"  min="0" class="col-3 mt-3 form-control " name="media_fees" placeholder="do">
                        </div>

                        <div class="cards-header col-md-12">Dodatkowe informacje</div>
                        <div class="col-md-4 d-flex">
                            <label for="elevator" class="col-6 mt-4">Winda</label>
                            <input id="elevator" type="checkbox" value="1" class="col-6 mt-3 form-control" autocomplete="0" name="elevator" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="number_of_lifts" class="col-6 mt-4">Liczba wind w budynku</label>
                            <input id="number_of_lifts" type="number" class="col-6 mt-3 form-control " name="number_of_lifts" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="flat_direction" class="col-6 mt-4">Kierunek mieszkania</label>
                            <input id="flat_direction" type="text" class="col-6 mt-3 form-control " name="flat_direction" >
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="brightness_of_flat" class="col-6 mt-4">Jasność mieszkania</label>
                            <input id="brightness_of_flat" type="text" class="col-6 mt-3 form-control " name="brightness_of_flat" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="sublet_permission" class="col-6 mt-4">Zgoda na podnajem</label>
                            <input id="sublet_permission" type="checkbox" value="1" class="col-6 mt-3 form-control " name="sublet_permission" >
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="family_with_children" class="col-6 mt-4">Rodzina z dziecmi</label>
                            <input id="family_with_children" type="checkbox" value="1" class="col-6 mt-3 form-control " name="family_with_children" >
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="animals" class="col-6 mt-4">Zwierzeta</label>
                            <input id="animals" type="checkbox" value="1" class="col-6 mt-3 form-control " name="animals" >
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="smoking_person" class="col-6 mt-4">Osoba palaca</label>
                            <input id="smoking_person" type="checkbox" value="1" class="col-6 mt-3 form-control " name="smoking_person" >
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="balcony" class="col-6 mt-4">Balkon</label>
                            <input id="balcony" type="checkbox" value="1" class="col-6 mt-3 form-control " name="balcony" >
                        </div>

                        <div class="cards-header col-md-12">Media</div>
                        @foreach(\App\Media::all() as $media)
                            <div class="col-md-4 d-flex">
                                <label for="$media->media_name" class="col-6 mt-4">{{$media->media_name}}</label>
                                <input id="$media->media_name" type="checkbox" class="col-6 mt-3 form-control " name="$media->media_name" >
                            </div>
                        @endforeach

                        <div class="cards-header col-md-12">Wyposażenie mieszkania</div>
                        @foreach(\App\FlatEquipment::all() as $equipment)
                            <div class="col-md-4 d-flex">
                                <label for="$equipment->equipment_name" class="col-6 mt-4">{{$equipment->equipment_name}}</label>
                                <input id="$equipment->equipment_name" type="checkbox" class="col-6 mt-3 form-control " name="$equipment->equipment_name" >
                            </div>
                        @endforeach


                        <div class="cards-header col-md-12">Wyposażenie łazienki</div>
                        @foreach(\App\BathroomEquipment::all() as $equipment)
                            <div class="col-md-4 d-flex">
                                <label for="$equipment->equipment_name" class="col-6 mt-4">{{$equipment->equipment_name}}</label>
                                <input id="$equipment->equipment_name" type="checkbox" class="col-6 mt-3 form-control " name="$equipment->equipment_name" >
                            </div>
                        @endforeach


                        <div class="cards-header col-md-12">Wyposażenie kuchni</div>
                        @foreach(\App\KitchenEquipment::all() as $equipment)
                            <div class="col-md-4 d-flex">
                                <label for="$equipment->equipment_name" class="col-6 mt-4">{{$equipment->equipment_name}}</label>
                                <input id="$equipment->equipment_name" type="checkbox" class="col-6 mt-3 form-control " name="$equipment->equipment_name" >
                            </div>
                        @endforeach










































                    </div>
                    <button class="  mt-4 btn btn-primary">Wyszukaj</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>

@endsection

