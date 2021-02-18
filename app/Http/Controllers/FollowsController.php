<?php

namespace App\Http\Controllers;

use App\Flat;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Flat $flat)
    {
        return auth()->user()->following()->toggle($flat);
    }
}
