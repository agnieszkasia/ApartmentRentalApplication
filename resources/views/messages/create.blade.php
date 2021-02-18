@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="cards shadow">
            <div class="cards-header ">
                @foreach(\App\User::all() as $user_to)
                    @if($user_to->id == $flat->user_id)
                <div>WIADOMOŚĆ DO UŻYTKOWNIKA: {{$user->name}} {{$user->last_name}}</div>
                        @endif
                    @endforeach
            </div>
            <div class="card-body">
                <form action="/messages/{{$user->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input id="user_to" type="number" title="user_to" name="user_to" value="{{$user->id}}" >
                    <input id="user_from" type="number" title="user_from" name="user_from" value="{{auth()->user()->id}}" >
                    <input id="seen" type="number" name="seen" title="seen" value="0" >
                    @if(auth()->user()->type_of_user == 'admin')
                        <input id="flat_id" type="number" name="flat_id" title="flat_id" value="0" >
                        @else
                        <input id="flat_id" type="number" name="flat_id" title="flat_id" value="{{$flat->id}}" >
                    @endif

                        <div class="row justify-content">
                        <div class="col-12 row">
                            <label for="content_of_message" class="col-3 mt-4">Treść wiadomości</label>
                            <input id="content_of_message" type="text" class="col-9 mt-3 form-control " name="content_of_message" >
                        </div>
                    </div>
                    <button class="mt-4 float-right btn btn-primary">Wyślij</button>
                </form>

            </div>
        </div>


    </div>
@endsection

