<?php

namespace App\Http\Controllers;

use App\Flat;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function create(User $user, Flat $flat)
    {

        return view('messages.create', compact('message', 'user', 'user_to', 'user_from', 'flat'));
    }

    public function show(User $user, Message $message)
    {
        return view('messages.show', compact('message', 'user', 'user_to', 'user_from'));
    }

    public function delete(User $user, Message $message)
    {
        return view('messages.delete', compact('message', 'user', 'user_to', 'user_from'));
    }

    public function deleteMessage(User $user, Message $message)
    {
        $user = \auth()->user();
        $data = request()->validate([
            'deleted1' => '',
        ]);
        $message->update($data);
        return redirect("/messages/{$user->id}");
    }

    public function showAll(User $user, Message $message)
    {
        return view('messages.showAll', compact('message', 'user'));
    }

    public function showAllSent(User $user, Message $message)
    {
        return view('messages.showAllSent', compact('message', 'user'));
    }

    public function showAllDeleted(User $user, Message $message)
    {
        return view('messages.showAllDeleted', compact('message', 'user'));
    }

    public function store(User $user, Message $message)
    {
        $data = request()->validate([
            'content_of_message' => '',
            'user_to' => '',
            'user_from' => '',
            'seen' => '',
            'flat_id' =>'',
            'blocked' =>'',
            'inactive' =>'',
        ]);

        auth()->user()->message()->create($data);
        return view('messages.showAll', compact('message', 'user')) ;
    }
}
