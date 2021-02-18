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
    <div class="container mt-5 mb-5">
        <div class="cards shadow">
            <div class="cards-header ">
                @foreach(\App\User::all() as $user_to)
                    @if($user_to->id == $user->id)
                        <div>POWIADOM O CHĘCI WYNAJMU MIESZKANIA </div>
                    @endif
                @endforeach
            </div>
            <div class="card-body">
                <form action="/messages/{{$flat->user_id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input id="user_to" type="number" title="user_to" name="user_to" value="{{$flat->user_id}}" hidden >
                    <input id="user_from" type="number" title="user_from" name="user_from" value="{{auth()->user()->id}}" hidden >
                    <input id="seen" type="number" name="seen" title="seen" value="0" hidden>
                    @if(auth()->user()->type_of_user == 'admin')
                        <input id="flat_id" type="number" name="flat_id" title="flat_id" value="0" hidden >
                    @endif
                    @if(auth()->user()->type_of_user != 'admin')
                        <input id="flat_id" type="number" name="flat_id" title="flat_id" value="{{$flat->id}}" hidden>
                    @endif

                    <div class="col-8 row">
                        <label for="content_of_message" class="col-6 mt-4">Wynajem od</label>
                        @if( $today < $flat->available_from)
                            <?php $today = $flat->available_from; ?>
                        @endif
                        <input id="content_of_message" type="date" class="col-6 mt-3 form-control " name="content_of_message"  min="<?php echo $today; ?>" value="<?php echo $today; ?>">
                    </div>


                    <button class="mt-4 float-right btn btn-primary">Akceptuj</button>
                </form>

            </div>
        </div>


    </div>

@endsection
