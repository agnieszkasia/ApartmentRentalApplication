@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="cards shadow mt-5">
            <div class="cards-header">
                <div>ZMIANA HASŁA</div>
            </div>
            <div class="card-body">
                <form method="POST" action="/profile/{{ $user->id }}">
                    @csrf

                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Obecne hasło</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Nowe hasło</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Potwierdź nowe hasło</label>

                        <div class="col-md-6">
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Zapisz
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>
    </div>
@endsection
