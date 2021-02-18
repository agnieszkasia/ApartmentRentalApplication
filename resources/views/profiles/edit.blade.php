@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="cards shadow mt-5">
            <div class="cards-header">
                <div>EDYTUJ PROFIL</div>
            </div>
            <div class="card-body">
                <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
                    @csrf

                    @method('PATCH')

                <div class="row justify-content form-group">
                    <div class="col-md-6 form-group row">
                        <label for="name" class="col-4 mt-3 col-md-4 col-form-label text-md-right">Imię</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="mt-3 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}">
                        </div>

                        <label for="second_name" class="mt-3 col-md-4 col-form-label text-md-right">Drugie imię*</label>
                        <div class="col-md-8">
                            <input id="second_name" type="text" class="mt-3 form-control " name="second_name" value="{{old('second_name') ?? $user->second_name}}">
                        </div>

                        <label for="last_name" class="mt-3 col-md-4 col-form-label text-md-right">Nazwisko</label>
                        <div class="col-md-8">
                            <input id="last_name" type="text" class=" mt-3 form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name') ?? $user->last_name}}">
                        </div>

                        <label for="place" class="mt-3 col-md-4 col-form-label text-md-right">Miejscowość</label>
                        <div class="col-md-8">
                            <input id="place" type="text" class="mt-3 form-control @error('place') is-invalid @enderror" name="place" value="{{old('place') ?? $user->place}}">
                        </div>

                        <label for="postcode" class="mt-3 col-md-4 col-form-label text-md-right">Kod pocztowy*</label>
                        <div class="col-md-8">
                            <input id="postcode" type="text" class=" mt-3 form-control " name="postcode" value="{{old('postcode') ?? $user->postcode}}" pattern="[0-9]{2}\-[0-9]{3}">
                        </div>
                    </div>

                    <div class="col-md-6 form-group row">
                        <label for="login" class="mt-3 col-md-4 col-form-label text-md-right">Login</label>
                        <div class="col-md-8">
                            <input id="login" type="text" class="mt-3 form-control @error('login') is-invalid @enderror" name="login" value="{{old('login') ?? $user->login}}">
                        </div>

                        <label for="gender" class="mt-3 col-md-4 col-form-label text-md-right">Płeć</label>
                        <div class="col-md-8">
                            <select id="gender" type="" class="mt-3 form-control " name="gender" value="{{old('gender') ?? $user->gender}}">
                                <option value="1">Kobieta</option>
                                <option value="2">Mężczyzna</option>
                                <option value="0">Inna</option>
                            </select>
                        </div>

                        <label for="birth_date" class="mt-3 col-md-4 col-form-label text-md-right">Data urodzenia*</label>
                        <div class="col-md-8">
                            <input id="birth_date" type="date" class="mt-3 form-control " name="birth_date" value="{{old('birth_date') ?? $user->birth_date}}">
                        </div>

                        <label for="phone_number" class="mt-3 col-md-4 col-form-label text-md-right">Numer telefonu</label>
                        <div class="col-md-8">
                            <input id="phone_number" type="tel" class="mt-3 form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{old('phone_number') ?? $user->phone_number}}">
                        </div>
                    </div>


                </div>
                    <button class="mb-4 float-right mr-5 btn btn-primary">Zapisz</button>
                </form>

            </div>
        </div>


    </div>
    </div>
@endsection
