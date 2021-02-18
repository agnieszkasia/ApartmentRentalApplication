@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="cards shadow">
                @cannot ('update', $user)
                    <div class="cards-header">PROFIL UŻYTKOWNIKA</div>
                @endcannot
                    @if(auth()->user()->type_of_user == 'admin' and $user->inactive == '0')
                        <div class="flex-center d-flex ml-4 mr-4">
                            <div><a href="/profile/{{ $user->id }}/edit" class="m-1 btn-primary btn">Edytuj</a></div>
                            @if($user->blocked == '0')
                                <div><a href="/profile/{{ $user->id }}/block" class="m-1 btn-primary btn">Zablokuj</a></div>
                            @else
                                <div><a href="/profile/{{ $user->id }}/unblock" class="m-1 btn-primary btn">Odblokuj</a></div>
                            @endif
                                <div><a href="/messages/{{ $user->id }}/create" class="m-1 btn-primary btn">Wyślij wiadomość</a></div>
                        </div>
                    @endif

                    @can ('update', $user)
                    <div class="cards-header">TWÓJ PROFIL</div>
                    <div><a href="/profile/{{ $user->id }}/edit" class="btn btn-primary top-right">Edytuj profil</a></div>
                @endcan

            <div class="card-body">
                <div class="row justify-content form-group">
                    <div class="col-md-6 form-group row">
                        <div class="mt-3 col-4 col-form-label text-right">Imię</div>
                        <div class="col-8 mt-4">{{$user->name}}</div>

                        <div class="mt-3 col-4 col-form-label text-right">Drugie imię*</div>
                        <div class="col-8 mt-4">{{$user->second_name}}</div>

                        <div class="mt-3 col-4 col-form-label text-right">Nazwisko</div>
                        <div class="col-8 mt-4">{{$user->last_name}}</div>

                        <div class="mt-3 col-4 col-form-label text-right">Miejscowość</div>
                        <div class="col-8 mt-4">{{$user->place}}</div>

                        <div class="mt-3 col-4 col-form-label text-right">Kod pocztowy*</div>
                        <div class="col-8 mt-4">{{$user->postcode}}</div>

                        <div class="mt-3 col-4 col-form-label text-right">E-mail</div>
                        <div class="col-8 mt-4">{{$user->email}}</div>
                    </div>

                    <div class="col-md-6 form-group row">
                        @can ('update', $user)
                        <div class="mt-3 col-4 col-form-label text-right">Login</div>
                        <div class="col-8 mt-4">{{$user->login}}</div>

                        <div class="mt-3 col-4 col-form-label text-right">Hasło</div>
                        <div class="col-8 mt-4 text-right"><a href="/profile/{{ $user->id }}/editpassword">Zmień</a></div>

                        <div class="mt-3 col-4 col-form-label text-right">Płeć</div>
                        <div class="col-8 mt-4">
                            @if($user->gender == 1)Kobieta @endif
                            @if($user->gender == 2)Mężczyzna @endif
                            @if($user->gender == 0)Inna @endif
                        </div>

                        <div class="mt-3 col-4 col-form-label text-right">Data urodzenia*</div>
                        <div class="col-8 mt-4">{{$user->birth_date}}</div>
                        @endcan
                        <div class="mt-3 col-4 col-form-label text-right">Numer telefonu</div>
                        <div class="col-8 mt-4">{{$user->phone_number}}</div>
                    </div>
                </div>

            </div>
        </div>
        @can ('update', $user)
        <div class="cards shadow mt-4 ">
            <div class="card-body">
                <div class="links mt-2">
                    <a href="/profile/{{ Auth::user()->id }}/flats">Twoje ogłoszenia
                    <div class="float-right"></div> </a>
                </div>
                <div class="links mt-2">
                    <a href="/reviews/{{ Auth::user()->id }}">Twoje opinie</a>
                </div>
                <div class="links mt-2">
                    <a href="/following">Obserwowane ogłoszenia</a>
                </div>
                <div class="links mt-2">
                    <a href="/messages/{{ Auth::user()->id }}">Wiadomości</a>
                </div>
                <div class="links mt-2">
                    <a href="/flat/create">Dodaj ogłoszenie</a>
                </div>

            </div>
        </div>
        @endcan
        @cannot('update', $user)
            @if(auth()->user()->type_of_user == 'user')
            <div class="cards shadow mt-4">
                <div class="card-body">
                    <div class="links mt-2"><a href="/messages/{{ $user->id }}/create">Wyślij wiadomość</a></div>
                    <div class="links mt-2"><a href="/reviews/{{ $user->id }}">Opinie użytkownika</a></div>
                    <div class="links mt-2"><a href="/reviews/{{ $user->id }}/create">Dodaj opinie o uzytkowniku</a></div>
                    <div class="links mt-2"><a href="/profile/{{ $user->id }}/flats">Zobacz wszystkie ogłoszenia użytkownika</a></div>

                </div>
            </div>
                @endif
        @endcannot
    </div>
    </div>
@endsection
