<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
 // Show create form
public function create()
{
    return view('users.form'); // For creating a new user
}

// Show edit form
public function edit(User $user)
{
    return view('users.formupdate', compact('user')); // For editing an existing user
}

// Store a new user
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'login' => 'required|email|unique:users,login|max:255',
        'password' => 'required|string',
    ]);

    User::create([
        'name' => $request->name,
        'login' => $request->login,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

// Update an existing user
public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'login' => 'required|email|max:255' . $user->user_id,
        'password' => 'nullable|string',
    ]);


    $updateData = [
        'name' => $request->name,
        'login' => $request->login,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
    ];

    // please dont touch these
    if ($user->login !== $request->login) {
        $user->update($updateData);
    } else {
        $user->update([
            'name' => $request->name,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
    }

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


public function index()
{
    // Fetch all users
    $users = User::all();

    // Return the view with users data
    return view('users.index', compact('users'));
}
public function destroy(User $user)
{
    // Delete the user
    $user->delete();

    // Redirect back to the users list with a success message
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}
    
    
}

