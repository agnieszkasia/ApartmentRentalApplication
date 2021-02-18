@extends('layouts.app')
<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
@section('content')
    <div class="container ">
    <div class="cards2 shadow mt-4 mb-5 ">
        <div class="cards-header">DODAJ OGŁOSZENIE</div>
        <div class="card-body">
            <form action="/profile/{{Auth::user()->id}}/flats" enctype="multipart/form-data" method="post">
                    @csrf





                <div class="form-group">
                    <label for="">Zdjęcia</label>
                    <textarea type="text" rows="5" autocomplete="OFF" name="item_images" id="item_images" placeholder="" class="form-control input-group-sm"></textarea>
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-image"></i>Dodaj zdjecia</button>
                    @if(Session::has('msg'))
                        {{Session::get('msg')}}
                    @endif
                </div>












                <div class="row justify-content">
                    <div class="col-6 row">
                        <input id="flat_id" type="number" title="flat_id" class="col-6 mt-3 form-control " name="flat_id"  value="{{$flat->id}}" hidden>
                    </div>
                </div>

                <input type="file" class="" id="img" name="img[]" multiple  hidden>
                <label for="img" class="btn btn-primary" hidden>Nie wybrano żadnego pliku, wybierz zdjęcia do dodania</label>


                    <div class="row justify-content">
                        <div class="col-md-6 row">
                            <label for="city_id" class="col-6 mt-4">Miasto</label>
                            <select id="city_id" class="col-6 mt-3 form-control" name="city_id">
                                @foreach(\App\City::all() as $city)
                                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 row">
                            <label for="district_id" class="col-6 mt-4">Dzielnica</label>
                            <select id="district_id" class="col-6 mt-3 form-control" name="district_id">
                                @foreach(\App\District::all() as $district)
                                    <option value="{{$district->id}}">{{$district->district_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 row">
                            <label for="street" class="col-6 mt-4">Ulica</label>
                            <input id="street" type="text" class="col-6 mt-3 form-control " name="street" >
                        </div>

                        <div class="col-md-6 row">
                            <label for="number_of_tenants" class="col-6 mt-4">Liczba lokatorów</label>
                            <input id="number_of_tenants" type="number" min="1"  max="20" value="1" class="col-6 mt-3 form-control " name="number_of_tenants" >
                        </div>
                        <div class="col-md-6 row">
                            <label for="flat_area" class="col-6 mt-4">Powierzchnia (m2)</label>
                            <input id="flat_area" type="number" value="0" class="col-6 mt-3 form-control " name="flat_area" >
                        </div>
                        <div class="col-md-6 row">
                            <label for="available_from" class="col-6 mt-4">Dostepne od</label>
                            <input id="available_from" type="date" value="<?php echo $today; ?>" class="col-6 mt-3 form-control " name="available_from" >
                        </div>
                        <div class="col-md-6 row">
                            <label for="floor_id" class="col-6 mt-4">Piętro</label>
                            <select id="floor_id" class="col-6 mt-3 form-control" name="floor_id">
                                @foreach(\App\Floor::all() as $floor)
                                    <option value="{{$floor->id}}">{{$floor->floor_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 row">
                            <label for="number_of_rooms_id" class="col-6 mt-4">Liczba pokoi</label>
                            <select id="number_of_rooms_id" class="col-6 mt-3 form-control" name="number_of_rooms_id">
                                @foreach(\App\NumberOfRooms::all() as $numberofrooms)
                                    <option value="{{$numberofrooms->id}}">{{$numberofrooms->number_of_rooms}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 row">
                            <label for="parking_place_id" class="col-6 mt-4">Miejsce parkingowe</label>
                            <select id="parking_place_id" class="col-6 mt-3 form-control" name="parking_place_id">
                                @foreach(\App\ParkingPlace::all() as $parking)
                                    <option value="{{$parking->id}}">{{$parking->number_of_parking_place}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 row">
                            <label for="number_of_parking_place" class="col-6 mt-4">Liczba miejsc parkingowych</label>
                            <input id="number_of_parking_place" type="number" value="0" min="0" class="col-6 mt-3 form-control " name="number_of_parking_place" >
                        </div>


                        <div class="col-md-12 row">
                            <label for="environment_description" class="col-6 mt-4">Opis otoczenia</label>
                            <textarea rows="5" id="environment_description" type="text" class="justify-content form-control" name="environment_description">
                    </textarea>
                        </div>

                    </div>

                <div class="cards-header">Informacje o budynku</div>
                <div class="row justify-content">
                    <div class="col-md-6 row">
                        <label for="type_of_building_id" class="col-6 mt-4">Rodzaj zabudowy</label>
                        <select id="type_of_building_id" class="col-6 mt-3 form-control" name="type_of_building_id">
                            @foreach(\App\TypeOfBuilding::all() as $typeOfBuilding)
                                <option value="{{$typeOfBuilding->id}}">{{$typeOfBuilding->type_of_building}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 row">
                        <label for="ground_floor_flats" class="col-6 mt-4">Liczba mieszkan na piętrze</label>
                        <input id="ground_floor_flats" type="number" value="0" class="col-6 mt-3 form-control " name="ground_floor_flats" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="number_of_floors" class="col-6 mt-4">Liczba pieter w budynku</label>
                        <input id="number_of_floors" type="number" value="0" class="col-6 mt-3 form-control " name="number_of_floors" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="heating_id" class="col-6 mt-4">Ogrzewanie</label>
                        <select id="heating_id" class="col-6 mt-3 form-control" name="heating_id">
                            @foreach(\App\Heating::all() as $heating)
                                <option value="{{$heating->id}}">{{$heating->type_of_heating}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 row">
                        <label for="rubbish" class="col-6 mt-4">Rodzaj utylizacji śmieci</label>
                        <input id="rubbish" type="text" class="col-6 mt-3 form-control " name="rubbish" >
                    </div>
                </div>

                <div class="cards-header">Opłaty</div>
                <div class="row justify-content">
                    <div class="col-md-6 row">
                        <label for="rent" class="col-6 mt-4">Cena wynajmu</label>
                        <input id="rent" type="number" value="0" min="0" class="col-6 mt-3 form-control " name="rent" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="additional_fees" class="col-6 mt-4">Oplaty dodatkowe</label>
                        <input id="additional_fees" type="number" value="0" min="0" class="col-6 mt-3 form-control " name="additional_fees" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="deposit" class="col-6 mt-4">Kaucja</label>
                        <input id="deposit" type="number" value="0" min="0" class="col-6 mt-3 form-control " name="deposit" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="media_fees" class="col-6 mt-4">Oplaty za media</label>
                        <input id="media_fees" type="number" value="0" min="0" class="col-6 mt-3 form-control " name="media_fees" >
                    </div>
                </div>

                <div class="cards-header">Dodatkowe informacje</div>
                <div class="row justify-content">
                    <div class="col-md-6 row">
                        <label for="balcony" class="col-6 mt-4">Balkon</label>
                        <input id="balcony" type="checkbox" value="1" class="col-6 mt-3 form-control " name="balcony" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="elevator" class="col-6 mt-4">Winda</label>
                        <input id="elevator" type="checkbox" value="1" class="col-6 mt-3 form-control" autocomplete="0" name="elevator" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="garage" class="col-6 mt-4">Udogodnienia dla niepełnosprawnych</label>
                        <input id="garage" type="checkbox" value="1" class="col-6 mt-3 form-control " name="garage" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="number_of_lifts" class="col-6 mt-4">Liczba wind</label>
                        <input id="number_of_lifts" type="number" value="0" class="col-6 mt-3 form-control " name="number_of_lifts" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="family_with_children" class="col-6 mt-4">Rodzina z dziecmi</label>
                        <input id="family_with_children" type="checkbox" value="1" class="col-6 mt-3 form-control " name="family_with_children" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="smoking_person" class="col-6 mt-4">Osoba palaca</label>
                        <input id="smoking_person" type="checkbox" value="1" class="col-6 mt-3 form-control " name="smoking_person" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="animals" class="col-6 mt-4">Zwierzeta</label>
                        <input id="animals" type="checkbox" value="1" class="col-6 mt-3 form-control " name="animals" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="sublet_permission" class="col-6 mt-4">Zgoda na podnajem</label>
                        <input id="sublet_permission" type="checkbox" value="1" class="col-6 mt-3 form-control " name="sublet_permission" >
                    </div>
                    <div class="col-md-6 row">
                        <label for="flat_direction" class="col-6 mt-4">Kierunek mieszkania</label>
                        <select id="flat_direction" type="text" class="col-6 mt-3 form-control " name="flat_direction" >
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-6 row">
                        <label for="brightness_of_flat" class="col-6 mt-4">Jasność mieszkania</label>
                        <select id="brightness_of_flat" type="text" class="col-6 mt-3 form-control " name="brightness_of_flat" >
                            <option></option>
                        </select>
                    </div>
                </div>


                <div class="cards-header">Media</div>
                <div class="row justify-content">
                @foreach(\App\Media::all() as $media)
                    <div class="col-6 row">
                        <label for="$media->media_name" class="col-6 mt-4">{{$media->media_name}}</label>
                        <input id="$media->media_name" type="checkbox" class="col-6 mt-3 form-control " name="$media->media_name" >
                    </div>
                @endforeach
                </div>


                <div class="cards-header">Wyposażenie mieszkania</div>
                <div class="row justify-content">
                @foreach(\App\FlatEquipment::all() as $flat_equipment)
                    <div class="col-6 row">
                        <label for="{{$flat_equipment->equipment_name}}" class="col-6 mt-4">{{$flat_equipment->equipment_name}}</label>
                        <input id="{{$flat_equipment->equipment_name}}" type="checkbox" class="col-6 mt-3 form-control " name="{{$flat_equipment->equipment_name}}" >
                    </div>
                @endforeach
                </div>

                <div class="cards-header">Wyposażenie łazienki</div>
                <div class="row justify-content">
                    @foreach(\App\BathroomEquipment::all() as $bathroom_equipment)
                        <div class="col-6 row">
                            <label for="{{$bathroom_equipment->equipment_name}}" class="col-6 mt-4">{{$bathroom_equipment->equipment_name}}</label>
                            <input id="{{$bathroom_equipment->equipment_name}}" type="checkbox" class="col-6 mt-3 form-control " name="{{$bathroom_equipment->equipment_name}}" >
                        </div>
                    @endforeach
                </div>

                <div class="cards-header">Wyposażenie kuchni</div>
                <div class="row justify-content">
                    @foreach(\App\KitchenEquipment::all() as $kitchen_equipment)
                        <div class="col-6 row">
                            <label for="{{$kitchen_equipment->equipment_name}}" class="col-6 mt-4">{{$kitchen_equipment->equipment_name}}</label>
                            <input id="{{$kitchen_equipment->equipment_name}}" type="checkbox" class="col-6 mt-3 form-control " name="{{$kitchen_equipment->equipment_name}}" >
                        </div>
                    @endforeach
                </div>

                <div class="cards-header">Opis mieszkania</div>
                <div class="">
                    <textarea title="description" rows="10" id="description" type="text" class="justify-content form-control" name="description">
                    </textarea>
                </div>
                    <button class="  mt-4 btn btn-primary">Dodaj</button>
                </form>
        </div>
    </div>
    </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dodaj zdjęcia</h4>
            </div>
            <div class="modal-body">
                <form action="" class="dropzone" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-primary btn" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>








@endsection

@section('script')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Dropzone.autoDiscover = false;
        var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
        // imageDataArray variable to set value in crud form
        var imageDataArray = new Array;
        // fileList variable to store current files index and name
        var fileList = new Array;
        var i = 0;
        $(function(){
            uploader = new Dropzone(".dropzone",{
                url: "{{url('item/image/upload')}}",
                paramName : "file",
                uploadMultiple :false,
                acceptedFiles : "image/*,video/*,audio/*",
                addRemoveLinks: true,
                forceFallback: false,
                maxFilesize: 256, // Set the maximum file size to 256 MB
                parallelUploads: 100,
            });//end drop zone
            uploader.on("success", function(file,response) {
                imageDataArray.push(response)
                fileList[i] = {
                    "serverFileName": response,
                    "fileName": file.name,
                    "fileId": i
                };

                i += 1;
                $('#item_images').val(imageDataArray);
            });
            uploader.on("removedfile", function(file) {
                var rmvFile = "";
                for (var f = 0; f < fileList.length; f++) {
                    if (fileList[f].fileName == file.name) {
                        // remove file from original array by database image name
                        imageDataArray.splice(imageDataArray.indexOf(fileList[f].serverFileName), 1);
                        $('#item_images').val(imageDataArray);
                        // get removed database file name
                        rmvFile = fileList[f].serverFileName;
                        // get request to remove the uploaded file from server
                        $.get( "{{url('item/image/delete')}}", { file: rmvFile } )
                            .done(function( data ) {
                                //console.log(data)
                            });
                        // reset imageDataArray variable to set value in crud form

                        console.log(imageDataArray)
                    }
                }

            });
        });
    </script>
@endsection

