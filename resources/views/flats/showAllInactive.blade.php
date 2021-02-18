@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            @can ('update', $user)
                <div class="cards-header mb-3">TWOJE OGŁOSZENIA</div>
                <div ><a href="/flat/create" class="top-right mr-4 btn-primary btn">Dodaj ogłoszenie</a></div>
                <div class=" mr-4 ml-4 cards-header justify-content-between">
                    <a href="/profile/{{auth()->user()->id}}/flats"  class="text-black-50">AKTYWNE</a>
                    <a href="/profile/{{auth()->user()->id}}/flats/inactive">NIEAKTYWNE</a>
                </div>
            @endcan
            @cannot ('update', $user)
                <div class="cards-header">OGŁOSZENIA UŻYTKOWNIKA: </div>
                <div class="text-center"><h5>{{$user->login}}</h5></div>
            @endcannot

            <div class="card-body">
                @foreach($user->flats as $flat)
                    @if($flat->visibility == '1')
                    <div class="mt-4 mb-4">
                        <div class="d-flex justify-content-between">
                            @foreach(\App\City::all() as $city)
                                @if($city->id == $flat->city_id)
                                    <a href="/flat/{{$flat->id }}" class=" mt-2 text-left">
                                        <h4>{{$city->city_name}}, nazwa dzielnicy</h4>
                                    </a>
                                @endif
                            @endforeach

                            @can ('update', $user)

                                <div class="d-flex justify-content-between float-right">
                                    <div><a href="/flat/{{ $flat->id }}/" class="mr-1 ml-1 btn-primary btn">Wznów</a></div>
                                    <div><a href="/rentalhistory/{{ $flat->id }}" class="mr-1 ml-1 btn-primary btn">Historia wynajmu</a></div>
                                </div>
                            @endcan
                            @cannot ('update', $flat)
                                <follow-button flat-id="{{$flat->id}}" follows="{{$follows}}"></follow-button>
                                <div><a class="btn btn-primary " href="/rent/{{$flat->id}}" >Wynajmij</a></div>
                            @endcan
                        </div>
                        <div>Cena: {{$flat->rent}}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
