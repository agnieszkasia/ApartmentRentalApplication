@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            @can ('update', $user)
                <div class="cards-header mb-3">TWOJE OPINIE</div>
                <div class=" mr-4 ml-4 cards-header justify-content-between">
                    <a href="/reviews/{{$user->id}} ">OTRZYMANE</a>
                    <a href="/reviews/blocked" class="text-black-50 ">WYSTAWIONE</a>
                </div>
            @endcan
            @cannot ('update', $user)
                <div class="cards-header mb-3">OPINIE UŻYTKOWNIKA {{$user->id}}</div>
            @endcannot

            <div class="card-body">
            @foreach(\App\Review::all() as $review)
                @if($review->user_about == $user->id and $review->blocked != '1')
                        <div class="mt-5">
                            <div class="d-flex justify-content-between">
                                <h4>
                                    {{$review->content_of_review}}
                                </h4>
                            </div>
                            <div>Dodana przez:
                                @foreach(\App\User::all() as $user_from)
                                    @if($user_from->id == $review->user_from)
                                        <a href="/profile/{{$user_from->id }}" class=" mt-2 text-left">
                                            {{$user_from->login}}
                                        </a>
                                    @endif
                                @endforeach
                                <div>Ocena: {{$review->number_of_stars}}</div>

                                <div>Dotyczy mieszkania:
                                    @foreach(\App\Flat::all() as $flat)
                                        @if($flat->id == $review->flat_id)
                                            @foreach(\App\City::all() as $city)
                                                @if($city->id == $flat->city_id)
                                                    <a href="/flat/{{$review->flat_id}}"> {{$city->city_name}}</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
