@extends('layouts.app')

@section('content')
    @if(auth()->user()->type_of_user == 'user')
    <div class="container mt-5 mb-5">
        {{--<div class="cards shadow">
            <div class="cards-header">SZUKAJ OGŁOSZEŃ</div>
            <div class="card-body">
                <form class="d-flex"  method="get">
                    @csrf
                    <div class="col-md-4 ">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="City">
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input id="odleglosci" type="text" class="form-control mt-4" name="odleglosci"  placeholder="Odległości">
                        <input id="liczba_pokoi" type="number" class="form-control mt-4" name="liczba_pokoi"  placeholder="Liczba pokoi">
                        <input id="ogrzewanie" type="text" class="form-control mt-4" name="ogrzewanie" placeholder="Ogrzewanie">
                    </div>

                    <div class="col-4 ">
                        <input id="District" type="text" class="form-control " name="District" placeholder="District">
                        <input id="Flat_Area" type="text" class="form-control mt-4" name="Flat_Area" placeholder="Flat_Area">
                        <input id="pietro" type="number" class="form-control mt-4" name="pietro" placeholder="Piętro">
                        <input id="media" type="text" class="form-control mt-4" name="media" placeholder="Media">

                    </div>

                    <div class="col-4 ">
                        <div class="d-flex">
                            <input id="cena_od" type="text" class="form-control col-md-6 col-md-offset-6" name="cena_od"  placeholder="Cena od" >
                            <input id="cena_do" type="text" class="form-control col-md-6" name="cena_do"  placeholder="do" >
                        </div>

                        <input id="rodzaj_zabudowy" type="text" class="form-control mt-4" name="rodzaj_zabudowy"  placeholder="Rodzaj zabudowy">
                        <input id="inne" type="number" class="form-control mt-4" name="inne" placeholder="Inne">

                        <input class="btn btn-primary mt-4" type="submit" name="szukaj" value="Wyszukaj">

                    </div>
                </form>
            </div>
        </div>--}}
        <div class="cards2 shadow mt-4">
            <div class="cards-header">STRONA GŁÓWNA</div>
        </div>

        @if(auth()->user()->following)
        <div class="cards2 shadow mt-4">
            <div class="cards-header">OBSERWOWANE</div>
            <div class="card-body">
                @foreach(auth()->user()->following as $flat)
                    <div class="d-flex">
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
                                @can ('update', $flat)
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
                                        <follow-button flat-id="{{$flat->id}}" follows="{{true}}"></follow-button>
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
                    </div>
                @endforeach

            </div>
        </div>
        @endif


        <div class="cards2 shadow mt-4">
            <div class="cards-header">TWOJE AKTYWNE OGŁOSZENIA</div>
            <div class="top-right mr-4"><a href="/flat/create">Dodaj ogłoszenie</a></div>
            <div class="card-body">
                @if(auth()->user()->flats !== null)
                @foreach(auth()->user()->flats as $flat)
                    @if($flat->visibility != 1)


                    <div class="d-flex">
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
                                @can ('update', $flat)
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
                    </div>

                    @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
    @else
        <div class="container mt-5 mb-5">
            <div class="cards shadow">
                <div class="cards-header">PANEL ADMINISTRATORA</div>
            </div>
            <div class="d-md-flex justify-content-between">
            <div class="cards shadow mt-5 mr-2">
                <div class="cards-header text-center">ZAREJESTROWANI UŻYTKOWNICY</div>
                <div class="card-body text-center">
                    <div><a href="/users" class="btn btn-primary mb-2" >AKTYWNI</a></div>
                    <div><a href="/users/blocked" class="btn btn-primary mb-2">ZABLOKOWANI</a></div>
                    <div><a href="/users/inactive" class="btn btn-primary mb-2">NIEAKTYWNI</a></div>
                </div>
            </div>
            <div class="cards shadow mt-5 mr-2">
                <div class="cards-header text-center">OGŁOSZENIA UŻYTKOWNIKÓW</div>
                <div class="card-body text-center">
                    <div><a href="/flats" class="btn btn-primary mb-2" >AKTYWNI</a></div>
                    <div><a href="/flats/blocked" class="btn btn-primary mb-2">ZABLOKOWANI</a></div>
                    <div><a href="/flats/inactive" class="btn btn-primary mb-2">NIEAKTYWNI</a></div>
                </div>
            </div>
            <div class="cards shadow mt-5 mr-2">
                <div class="cards-header text-center">OPINIE UŻYTKOWNIKÓW</div>
                <div class="card-body text-center">
                    <div><a href="/reviews "  class="btn btn-primary mb-2">WIDOCZNE</a></div>
                    <div><a href="/reviews/blocked" class="btn btn-primary mb-2">UKRYTE</a></div>
                </div>
            </div>
            </div>
        </div>
    @endif
@endsection


