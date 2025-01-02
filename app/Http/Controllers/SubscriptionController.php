<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Frequency;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        // Get all subscriptions with their frequency
        $subscriptions = Subscription::with('frequency')->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create($user_id)
    {
        $frequencies = Frequency::all();
        return view('subscriptions.form', compact('frequencies', 'user_id'));
    }    

    public function store(Request $request, $user_id)
    {
        $validated = $request->validate([
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'frequency_id' => 'required|exists:frequencies,frequency_id',
        ]);
    
        Subscription::create([
            'produk' => $validated['produk'],
            'harga' => $validated['harga'],
            'due_date' => $validated['due_date'],
            'frequency_id' => $validated['frequency_id'],
            'user_id' => $user_id, // Extracted from URL
        ]);
        return redirect()->route('users.index')->with('success', 'Subscription added successfully!');

    }
    
    public function edit(Subscription $subscription)
    {
        $frequencies = Frequency::all();
        return view('subscriptions.formupdate', compact('subscription', 'frequencies'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        // Validate input data
        $request->validate([
            'produk' => 'required',
            'harga' => 'required|numeric',
            'due_date' => 'required|date',
            'frequency_id' => 'required|exists:frequencies,frequency_id',
        ]);
    
        // Update the subscription data
        $subscription->update([
            'produk' => $request->produk,
            'harga' => $request->harga,
            'due_date' => $request->due_date,
            'frequency_id' => $request->frequency_id,
        ]);
    
        return redirect()->route('subscriptions.user', $subscription->user_id);
    }

    public function destroy($subscription_id)
    {
        // Find the subscription using subscription_id
        $subscription = Subscription::where('subscription_id', $subscription_id)->firstOrFail();
    
        // Delete the subscription
        $subscription->delete();
    
        // Redirect back with a success message
        return redirect('/user')->with('success', 'Subscription deleted successfully!');
    }
    
    

    public function show(Subscription $subscription)
    {
    // Get the payments related to this subscription
    $payments = $subscription->payments;
    // Return the 'payment' view with the subscription and its payments
    return view('payment', compact('subscription', 'payments'));
    }

}
