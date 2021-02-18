@extends('layouts.app')
<?php

$month = date('m');
$month2 = date('m')+1;
$day = date('d');
$day2 = date('d')-1;
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
$nextMonth =  $year . '-' . $month2 . '-' . $day2;
?>
@section('content')
    <div class="container mt-5">
        <div class="cards shadow mt-4">
            <div class="card-body">
                <div class="col-8 row">
                    {{}}
                    <div class="col-6 mt-4">Miasto</div>
                    @foreach(\App\City::all() as $city)
                        @if($city->id == $flat->city_id)
                            <div class="col-6 mt-4 ">{{$city->city_name}}</div>
                        @endif
                    @endforeach
                </div>
                <form action="/acceptrent/{{$flat->id}}/accept" enctype="multipart/form-data" method="post">
                    @csrf


                    @method('PATCH')
                        <input id="user_id" title="user_id" type="number" name="user_id" value="{{$user->id}}" >
                        <input id="flat_id" title="flat_id" type="number" name="flat_id" value="{{$flat->id}}" >

                    <div class="col-8 row">
                        <label for="since_when" class="col-6 mt-4">Wybierz datę wynajmu</label>
                        @if( $today < $flat->available_from)
                            <?php $today = $flat->available_from; ?>
                        @endif
                        <input id="since_when" type="date" class="col-6 mt-3 form-control " name="since_when"  min="<?php echo $today; ?>" value="<?php echo $today; ?>">


                    </div>

                    <div class="col-8 row">
                        <label for="until_when" class="col-6 mt-4">Wybierz datę wynajmu</label>
                        @if( $nextMonth < $flat->available_from)
                            <?php $nextMonth = $flat->available_from; ?>
                        @endif
                        <input id="until_when" type="date" class="col-6 mt-3 form-control " name="until_when"  min="<?php echo $nextMonth; ?>" value="<?php echo $nextMonth; ?>">


                    </div>
                    <button class="  mt-4 btn btn-primary">Wynajmij</button>
                </form>
            </div>
        </div>
    </div>

@endsection
