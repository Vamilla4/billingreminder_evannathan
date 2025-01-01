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
        $frequencies = Frequency::all();
        return view('subscriptions.form', compact('frequencies'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'due_date' => 'required|date',
            'frequency_id' => 'required|exists:frequencies,frequency_id',
        ]);
    
        // Create a new subscription
        $subscription = new Subscription();
        $subscription->produk = $request->produk;
        $subscription->harga = $request->harga;
        $subscription->due_date = $request->due_date;
        $subscription->frequency_id = $request->frequency_id;
        $subscription->save();
    
        // Redirect with a success message or back
        return redirect()->route('subscriptions.index')->with('success', 'Subscription added successfully!');
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
