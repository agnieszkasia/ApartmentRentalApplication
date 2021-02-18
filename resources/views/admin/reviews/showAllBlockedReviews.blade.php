@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="cards shadow mt-5">
            <div class="cards-header mb-3">OPINIE UŻYTKOWNIKÓW</div>
            <div class=" mr-4 ml-4 cards-header justify-content-between">
                <a href="/reviews "  class="text-black-50 ">WIDOCZNE</a>
                <a href="/reviews/blocked">UKRYTE</a>
            </div>
            <div class="card-body">
                @foreach(\App\Review::all() as $review)
                    @if($review->blocked == '1')
                        <div class="mt-4">
                            <div class="d-flex justify-content-between">
                                <h4>Opinia o:
                                @foreach(\App\User::all() as $user_about)
                                    @if($user_about->id == $review->user_about)
                                            <a href="/profile/{{$user_about->id }}" class=" mt-2 text-left">
                                                {{$user_about->login}}
                                            </a>
                                    @endif
                                @endforeach
                                </h4>
                                <div class="justify-content-between d-flex">
                                    <div><a class="m-1 btn btn-primary " href="/review/{{$review->id}}/unblock" >Przywróć</a></div>
                                </div>
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
                                <div>Treść opinii: {{$review->content_of_review}}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
