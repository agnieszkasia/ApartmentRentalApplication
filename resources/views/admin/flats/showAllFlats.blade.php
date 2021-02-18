@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header mb-3">OGŁOSZENIA UŻYTKOWNIKÓW</div>
            <div class=" mr-4 ml-4 cards-header justify-content-between">
                <a href="/flats" >AKTYWNE</a>
                <a href="/flats/blocked" class="text-black-50">ZABLOKOWANE</a>
                <a href="/flats/inactive" class="text-black-50">NIEAKTYWNE</a>
            </div>

                <div class="card-body">
                @foreach(\App\Flat::all() as $flat)
                    @if($flat->visibility != '1' and $flat->blocked != '1')
                            <div class="d-md-flex">
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
                                            <div class="d-flex justify-content-between float-right">
                                                <div><a class="m-1 btn btn-primary " href="/flats/{{$flat->id}}/edit" >Edytuj</a></div>
                                                <div><a class="m-1 btn btn-primary " href="/flats/{{$flat->id}}/block" >Zablokuj</a></div>
                                                <div><a class="m-1 btn btn-primary " href="/messages/{{$flat->user_id}}/create" >Wyślij wiadomość</a></div>
                                            </div>
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
                            </div>
                        @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
