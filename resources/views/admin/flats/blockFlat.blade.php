@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header ">ZABLOKUJ OGŁOSZENIE</div>
            <div class="card-body">
                <div class="card-body">
                    <form action="/flat/{{$flat->id}}/block" enctype="multipart/form-data" method="post">
                        @csrf

                        @method('PATCH')
                        <label for="blocked">Czy na pewno chcesz zablokowac ogłoszenie?</label>
                        <input id="blocked" title="blocked" type="text" name="blocked" value="1" >
                        <button class="mt-2 btn btn-primary float-right" type="submit">Zablokuj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
