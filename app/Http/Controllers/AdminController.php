<?php

namespace App\Http\Controllers;

use App\Flat;
use App\Review;
use App\User;

class AdminController extends Controller
{
    /*blokowanie użytkownika*/
    public function blockUser(User $user)
    {
        return view('admin.users.blockUser', compact('user'));
    }

    public function blockedUser(User $user)
    {
        $data = request()->validate([
            'blocked' => '',
        ]);
        $user->update($data);
        return redirect("/users");
    }

    /*odblokowanie użytkownika*/
    public function unblockUser(User $user)
    {
        return view('admin.users.unblockUser', compact('user'));
    }

    public function unblockedUser(User $user)
    {
        $data = request()->validate([
            'blocked' => '',
        ]);
        $user->update($data);
        return redirect("/users/blocked");
    }

    /*blokowanie ogłoszenia*/
    public function blockFlat(Flat $flat)
    {
        return view('admin.flats.blockFlat', compact('flat'));
    }

    public function blockedFlat(Flat $flat)
    {
        $data = request()->validate([
            'blocked' => '',
        ]);
        $flat->update($data);
        return redirect("/flats");
    }

    /*odblokowanie ogłoszenia*/
    public function unblockFlat(Flat $flat)
    {
        return view('admin.flats.unblockFlat', compact('flat'));
    }

    public function unblockedFlat(Flat $flat)
    {
        $data = request()->validate([
            'blocked' => '',
        ]);
        $flat->update($data);
        return redirect("/flats");
    }

    /*ukrywanie opinii o użytkowniku*/
    public function blockReview(Review $review)
    {
        return view('admin.reviews.blockReview', compact('review'));
    }

    public function blockedReview(Review $review)
    {
        $data = request()->validate([
            'blocked' => '',
        ]);
        $review->update($data);
        return redirect("/reviews");
    }

    /*odblokowanie opinii o użytkowniku*/
    public function unblockReview(Review $review)
    {
        return view('admin.reviews.unblockReview', compact('review'));
    }

    public function unblockedReview(Review $review)
    {
        $data = request()->validate([
            'blocked' => '',
        ]);
        $review->update($data);
        return redirect("/reviews");
    }


    public function showAllUsers(User $user)
    {
        return view('admin.users.showAllUsers', compact('user'));
    }

    public function showAllBlockedUsers(User $user)
    {
        return view('admin.users.showAllBlockedUsers', compact('user'));
    }

    public function showAllInactiveUsers(User $user)
    {
        return view('admin.users.showAllInactiveUsers', compact('user'));
    }

    public function showAllFlats(User $user)
    {
        return view('admin.flats.showAllFlats', compact('user'));
    }

    public function showAllBlockedFlats(User $user)
    {
        return view('admin.flats.showAllBlockedFlats', compact('user'));
    }

    public function showAllInactiveFlats(User $user)
    {
        return view('admin.flats.showAllInactiveFlats', compact('user'));
    }

    public function showAllReviews(User $user)
    {
        return view('admin.reviews.showAllReviews', compact('user'));
    }

    public function showAllBlockedReviews(User $user)
    {
        return view('admin.reviews.showAllBlockedReviews', compact('user'));
    }
}
