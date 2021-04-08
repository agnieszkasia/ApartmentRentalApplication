<?php

namespace App\Http\Controllers;

use App\Flat;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Flat $flat, User $user){
        $follows = (auth()->user()) ? auth()->user()->following->contains($flat->id) : false;
        return view('home', compact('flat', 'follows', 'user'));
    }

    public function welcome()
    {

        return view('welcome');
    }
}
