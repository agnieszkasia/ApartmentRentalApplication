@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="cards shadow mt-4">
            <div class="cards-header">OBSERWOWANE</div>
            <div class="card-body">
                @foreach(Auth::user()->following as $flat)
                    @if($flat->visibility != '1')
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
                                        <div><a href="/flat/{{ $flat->id }}/edit" class="mr-1 ml-1 btn-primary btn">Edytuj</a></div>
                                        <div><a href="/rentalhistory/{{ $flat->id }}" class="mr-1 ml-1 btn-primary btn">Historia wynajmu</a></div>
                                    </div>
                                @endcan
                                @cannot ('update', $flat)
                                    <follow-button flat-id="{{$flat->id}}" follows="{{$follows}}"></follow-button>
                                    <div><a class="btn btn-primary " href="/rent/{{$flat->id}}" >Wynajmij</a></div>
                                @endcan
                            </div>
                            <div>Cena: {{$flat->rent}}</div>
                            <div>Dostępne od: {{$flat->available_from}}</div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

@endsection
