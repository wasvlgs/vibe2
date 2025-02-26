<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{

    public function decline($id)
    {
        $friendRequest = FriendRequest::findOrFail($id);
        $friendRequest->status = 'declined';
        $friendRequest->save();

        return redirect()->back()->with('status', 'Friend request declined');
    }
    // Send a friend request to another user
    public function send(User $user)
    {
        // Ensure the user is not sending a request to themselves
        if ($user->id == auth()->id()) {
            return redirect()->route('users.index')->with('error', 'You cannot send a friend request to yourself');
        }

        // Create a new friend request
        FriendRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'status' => 'pending',
        ]);

        return redirect()->route('users.index')->with('status', 'Friend request sent');
    }

    // Accept a friend request
    public function accept($id)
    {
        $friendRequest = FriendRequest::findOrFail($id);
        $friendRequest->status = 'accepted';
        $friendRequest->save();

        return redirect()->back()->with('status', 'Friend request accepted');
    }
}
