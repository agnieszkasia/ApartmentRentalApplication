<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;

class ReviewsController extends Controller
{
    public function create(User $user)
    {
        $user_1 = auth()->user()->id;
        return view('reviews.create', compact('review', 'user', 'User_About', 'User_From'));
    }

    public function showAll(User $user, Review $review)
    {

        return view('reviews.showAll', compact('review', 'user'));
    }
    public function store(User $user, Review $review)
    {
        $data = request()->validate([
            'content_of_review' => '',
            'number_of_stars' => '',
            'user_about' => '',
            'user_from' => '',
        ]);

        auth()->user()->reviews()->create($data);
        return view('reviews.showAll', compact('review')) ;
    }
}
