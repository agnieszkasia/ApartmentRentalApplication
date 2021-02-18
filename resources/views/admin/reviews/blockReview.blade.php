@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header ">UKRYJ OPINIĘ</div>
            <div class="card-body">
                <div class="card-body">
                    <form action="/reviews/{{$review->id}}/block" enctype="multipart/form-data" method="post">
                        @csrf

                        @method('PATCH')
                        <label for="blocked">Czy na pewno chcesz ukryć opinię?</label>
                        <input id="blocked" title="blocked" type="text" name="blocked" value="1" hidden>
                        <button class="mt-2 btn btn-primary float-right" type="submit">Ukryj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
