@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header mb-3">ZAREJESTROWANI UŻYTKOWNICY</div>
            <div class=" mr-4 ml-4 cards-header justify-content-between">
                <a href="/users" class="text-black-50">AKTYWNI</a>
                <a href="/users/blocked">ZABLOKOWANI</a>
                <a href="/users/inactive" class="text-black-50">NIEAKTYWNI</a>
            </div>
                <div class="card-body">
                    @foreach(\App\User::all() as $user)
                        @if(($user->type_of_user == 'user') && ($user->blocked == '1'))
                            <div class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <a href="/profile/{{$user->id }}" class="mt-1">
                                        <h4>{{ __('Użytkownik: ') }}{{$user->login}}</h4>
                                    </a>
                                    <div class="justify-content-between d-flex">
                                        <div><a href="/profile/{{ $user->id }}/edit" class="mr-1 ml-1 btn-primary btn">Edytuj</a></div>
                                        <div><a href="/profile/{{ $user->id }}/unblock" class="mr-1 ml-1 btn-primary btn">Odblokuj</a></div>
                                        <div><a href="/messages/{{ $user->id }}/create" class="mr-1 ml-1 btn-primary btn">Wyślij wiadomość</a></div>
                                    </div>
                                </div>
                                <div>Imię Nazwisko: {{$user->name}} {{$user->last_name}}</div>
                                <div>Miejscowość:{{$user->place}}</div>
                                <div>Email: {{$user->email}}</div>
                            </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
@endsection
