@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header mb-3">TWOJE WIADOMOŚCI</div>
            <div class=" mr-4 ml-4 cards-header justify-content-between">
                <a href="/messages/{{auth()->user()->id}}" class="text-black-50">ODEBRANE</a>
                <a href="/messages/{{auth()->user()->id}}/sent" >WYSŁANE</a>
                <a href="/messages/{{auth()->user()->id}}/deleted" class="text-black-50" >KOSZ</a>
            </div>

            <div class="card-body">
                @foreach(\App\Message::all() as $message)
                    @if(auth()->user()->id == $message->user_from and $message->deleted2 != '1')
                            <div class="mt-4">
                                <div class="cards-header d-flex justify-content-between">
                                    @foreach(\App\User::all() as $user_to)
                                        @if($message->user_to == $user_to->id)
                                    <a href="/message/{{$message->id }}">
                                        {{ __('Wiadomość do:') }}
                                        {{$user_to->name}} {{$user_to->last_name}}
                                    </a>
                                        @endif
                                        @endforeach
                                        <div class="justify-content-between d-flex">
                                            <div><a class="m-1 btn btn-primary " href="/message/{{$message->id}}/delete" >Usuń</a></div>
                                        </div>
                                </div>
                                <div>Data wysłania: {{$message->created_at}}</div>
                                @if(auth()->user()->type_of_user != 'admin')
                                <div>Dotyczy mieszkania: <a href="/flat/{{$message->flat_id}}"> {{$message->flat_id}}</a></div>
                                    @endif
                            </div>
                        @endif
                @endforeach


            </div>
        </div>
    </div>
@endsection
