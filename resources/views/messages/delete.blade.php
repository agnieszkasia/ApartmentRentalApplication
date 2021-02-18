@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">

            <div class="cards shadow">
            <div class="cards-header ">
                @foreach(\App\User::all() as $user_from)
                    @if($message->user_from == $user_from->id)
                <div>USUŃ WIADOMOŚĆ DO: {{$user_from->name}} {{$user_from->last_name}}</div>
                    @endif
                    @endforeach
            </div>
            <div class="card-body">
                <form action="/message/{{$message->id}}/delete" enctype="multipart/form-data" method="post">
                    @csrf

                    @method('PATCH')
                    <div>Treść wiadomości: {{$message->content_of_message}}</div>
                    <input id="deleted1" type="number" title="deleted1" name="deleted1" value="1" hidden>
                    <button class="mt-2 btn btn-primary float-right" type="submit">Usuń</button>
                </form>

            </div>
        </div>

    </div>
@endsection

