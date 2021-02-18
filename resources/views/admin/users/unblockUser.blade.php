@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header ">ODBLOKUJ KONTO UŻYTKOWNIKA</div>

            <div class="card-body">
                <div class="card-body">
                    <form action="/users/{{$user->id}}/block" enctype="multipart/form-data" method="post">
                        @csrf

                        @method('PATCH')
                            <div>Login: {{$user->login}}</div>
                            <div>Imię Nazwisko: {{$user->name}} {{$user->last_name}}</div>
                            <div>Miejscowość: {{$user->place}}</div>
                            <div>Email: {{$user->email}}</div>
                        <input id="blocked" title="blocked" type="text" name="blocked" value="0" hidden >
                        <button class="mt-2 btn btn-primary float-right" type="submit">Odblokuj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
