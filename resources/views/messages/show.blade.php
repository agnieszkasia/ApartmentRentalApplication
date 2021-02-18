@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="cards shadow">
            <div class="mt-4 card-body">
                <div class="cards-header d-flex justify-content-between">
                    @foreach(\App\User::all() as $user_to)
                        @if(auth()->user()->id == $message->user_from and $message->user_to == $user_to->id)
                            <a href="/message/{{$message->id }}">
                                {{ __('Wiadomość do:') }}
                                {{$user_to->name}} {{$user_to->last_name}}
                            </a>
                        @endif
                        @if(auth()->user()->id == $message->user_to and $message->user_from == $user_to->id)
                            <a href="/message/{{$message->id }}">
                                {{ __('Wiadomość od:') }}
                                {{$user_to->name}} {{$user_to->last_name}}
                            </a>
                        @endif
                    @endforeach
                    <div class="justify-content-between d-flex">
                        <div><a class="m-1 btn btn-primary " href="/message/{{$message->id}}/delete" >Usuń</a></div>
                        <div><a class="m-1 btn btn-primary " href="/messages/{{$user_to->id}}/create" >Odpowiedz</a></div>
                        <div><a class="m-1 btn btn-primary " href="/acceptrent/{{$message->flat_id}}" >Wynajmij</a></div>
                    </div>
                </div>
                <div>Data wysłania: {{$message->created_at}}</div>
                <div>Dotyczy mieszkania:
                    @foreach(\App\Flat::all() as $flat)
                        @if($flat->id == $message->flat_id)
                            @foreach(\App\City::all() as $city)
                                @if($city->id == $flat->city_id)
                    <a href="/flat/{{$message->flat_id}}"> {{$city->city_name}}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div>{{$message->content_of_message}}</div>

            </div>
        </div>


    </div>
@endsection

