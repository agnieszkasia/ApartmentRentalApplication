@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header mb-3">OGŁOSZENIA UŻYTKOWNIKÓW</div>
            <div class=" mr-4 ml-4 cards-header justify-content-between">
                <a href="/flats "class="text-black-50 ">AKTYWNE</a>
                <a href="/flats/blocked"class="text-black-50 ">ZABLOKOWANE</a>
                <a href="/flats/inactive ">NIEAKTYWNE</a>
            </div>

                <div class="card-body">
                    @foreach(\App\Flat::all() as $flat)
                        @if($flat->visibility == '1')
                            <div class="mt-4">
                                <div class="d-flex justify-content-between">
                                    @foreach(\App\City::all() as $city)
                                        @if($city->id == $flat->city_id)
                                            <a href="/flat/{{$flat->id }}" class=" mt-2 text-left">
                                                <h4>{{$city->city_name}}, nazwa dzielnicy</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                    <div class="justify-content-between d-flex">

                                    </div>
                                </div>
                                @foreach(\App\User::all() as $user)
                                    @if($flat->user_id == $user->id)
                                        <div>Ogłoszenie użytkownika: <a href="/profile/{{$flat->user_id}}"> {{$user->login}}</a></div>
                                    @endif
                                @endforeach
                                <div>Cena: {{$flat->rent}}</div>
                                <div>Dostępne od: {{$flat->available_from}}</div>
                                <div>Powierzchnia: {{$flat->flat_area}}</div>
                            </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
@endsection
