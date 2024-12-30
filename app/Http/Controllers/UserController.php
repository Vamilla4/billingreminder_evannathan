<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // Method to show user's subscriptions
    public function showSubscriptions($user_id)
    {
        // Fetch the user by the provided user_id
        $user = User::where('user_id', $user_id)->first();
        
        // If the user doesn't exist, redirect back to the user list
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }
    
        // Fetch the subscriptions related to this user
        $subscriptions = $user->subscriptions;
    
        // Return the view with the user's subscriptions
        return view('subscription', compact('user', 'subscriptions'));
    }
    
    
}

