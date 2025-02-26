<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Fetch pending friend requests for the authenticated user
        $friendRequests = FriendRequest::where('receiver_id', auth()->id())
                                        ->where('status', 'pending')
                                        ->get();

        // Fetch all users excluding the current authenticated user
        $users = User::where('id', '!=', auth()->id())->get();

        // Return the view and pass the data
        return view('users.index', compact('friendRequests', 'users'));
    }
}
