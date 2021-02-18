@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header mb-3">TWOJE WIADOMOŚCI</div>
            <div class=" mr-4 ml-4 cards-header justify-content-between">
                <a href="/messages/{{auth()->user()->id}}" >ODEBRANE</a>
                <a href="/messages/{{auth()->user()->id}}/sent" class="text-black-50">WYSŁANE</a>
                <a href="/messages/{{auth()->user()->id}}/deleted" class="text-black-50" >KOSZ</a>
            </div>

            <div class="card-body">
                @foreach(\App\Message::all() as $message)
                    @if(auth()->user()->id == $message->user_to and $message->deleted1 != '1')
                        <div class="mt-4">
                            <div class="cards-header d-flex justify-content-between">
                                @foreach(\App\User::all() as $user_from)
                                    @if($message->user_from == $user_from->id)
                                        <a href="/message/{{$message->id }}">
                                            {{ __('Wiadomość od:') }}
                                            {{$user_from->name}} {{$user_from->last_name}}
                                        </a>
                                    @endif
                                @endforeach
                                <div class="justify-content-between d-flex">
                                    <div><a class="m-1 btn btn-primary " href="/message/{{$message->id}}/delete" >Usuń</a></div>
                                    <div><a class="m-1 btn btn-primary " href="/messages/{{$message->user_from}}/create" >Odpowiedz</a></div>
                                </div>
                            </div>
                            <div>Data wysłania: {{$message->created_at}}</div>
                            <div>Dotyczy mieszkania:
                                @foreach(\App\Flat::all() as $flat)
                                    @if($flat->id == $message->flat_id)
                                        @foreach(\App\City::all() as $city)
                                            @if($city->id == $flat->city_id)
                                                @foreach(\App\District::all() as $district)
                                                    @if($district->id == $flat->district_id)
                                                <a href="/flat/{{$message->flat_id}}"> {{$city->city_name}}, {{$district->district_name}}</a>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    @endif

                @endforeach
            </div>
        </div>
    </div>
@endsection
