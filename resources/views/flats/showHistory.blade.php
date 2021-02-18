@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
                <div class="cards-header mb-3">HISTORIA WYNAJMU MIESZKANIA {{$flat->id}}</div>
            <div class="card-body">
                @foreach(\App\RentalHistory::all() as $history)
                    @if($history->flat_id == $flat->id)
                        <div class="mt-4">
                            <div class="cards-body">
                                <div>
                                    <a href="/profile/{{$history->user_id }}">
                                        {{ __('Wynajęte przez:') }}{{$history->user_id}}
                                    </a>
                                </div>
                                <div>Od: {{$history->since_when}}</div>
                                <div>Do: {{$history->until_when}}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
