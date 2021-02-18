<?php

namespace App\Http\Controllers;

use App\Flat;
use App\RentalHistory;
use App\User;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    public function rent(Flat $flat)
    {
        $user = auth()->user();
        return view('flats.rent', compact('flat', 'user'));
    }

    public function create()
    {

        return view('flats.rent', compact('flat'));
    }

    public function acceptRent(Flat $flat, User $user)
    {
        return view('flats.acceptRent', compact('flat', 'user'));
    }

    public function addToHistory(RentalHistory $rentalHistory, Flat $flat, User $user)
    {
        $data = request()->validate([
            'since_when' => '',
            'until_when' => '',
            'user_id' =>'',
            'flat_id' =>'',
        ]);

        $rentalHistory->create($data);
        return redirect(route('flats.showAll'));
    }

    public function showHistory(User $user, Flat $flat, RentalHistory $rentalHistory)
    {
        return view('flats.showHistory', compact('user', 'flat','rentalHistory'));
    }
}
