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

    public function create()
    {
        // Fetch all frequencies for the dropdown
        $frequencies = Frequency::all();
        return view('subscriptions.create', compact('frequencies'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'produk' => 'required',
            'harga' => 'required|numeric',
            'due_date' => 'required|date',
            'frequency_id' => 'required|exists:frequencies,id',
        ]);

        // Create the new subscription
        Subscription::create([
            'produk' => $request->produk,
            'harga' => $request->harga,
            'due_date' => $request->due_date,
            'frequency_id' => $request->frequency_id,
            'user_id' => $request->user_id, // Ensure correct user_id
        ]);

        return redirect()->route('subscriptions.index');
    }

    public function edit(Subscription $subscription)
    {
        // Fetch all frequencies for the dropdown
        $frequencies = Frequency::all();
        return view('subscriptions.edit', compact('subscription', 'frequencies'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        // Validate input data
        $request->validate([
            'produk' => 'required',
            'harga' => 'required|numeric',
            'due_date' => 'required|date',
            'frequency_id' => 'required|exists:frequencies,id',
        ]);

        // Update the subscription data
        $subscription->update([
            'produk' => $request->produk,
            'harga' => $request->harga,
            'due_date' => $request->due_date,
            'frequency_id' => $request->frequency_id,
        ]);

        return redirect()->route('subscriptions.index');
    }

    public function destroy(Subscription $subscription)
    {
        // Delete the subscription
        $subscription->delete();
        return redirect()->route('subscriptions.index');
    }

    public function show(Subscription $subscription)
    {
    // Get the payments related to this subscription
    $payments = $subscription->payments;
    // Return the 'payment' view with the subscription and its payments
    return view('payment', compact('subscription', 'payments'));
    }

}
