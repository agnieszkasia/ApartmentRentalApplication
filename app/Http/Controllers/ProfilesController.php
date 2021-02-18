<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{


    //trzeba byc zalogowanym zeby zobaczyc strone
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        if (auth()->user()->type_of_user == 'user')
            $this->authorize('update', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        /*sprawdzenie czy użytkownik nie jest adminem*/
        if (auth()->user()->type_of_user != 'admin')
            /*ustawienie uprawnień do edycji danych*/
            $this->authorize('update', $user);

            /*walidacja danych*/
        $data = request()->validate([
            'name' => 'required|max:50',
            'second_name' => 'max:50',
            'last_name' => 'required|max:50',
            'birth_date' => '',
            'place' => 'required|max:50',
            'postcode' => '|max:6',
            'login' => 'required|max:45',
            'password' => '',
            'gender' => '',
            'phone_number' => 'required|max:11',
            'type_of_user' => '',
        ]);

        /*aktualizajca danych*/
        $user->update($data);

        /*przekierowanie do strony profilu użytkownika*/
        return redirect("/profile/{$user->id}");
    }
}
