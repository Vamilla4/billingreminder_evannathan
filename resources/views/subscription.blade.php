@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}'s Subscriptions</h1>
    <a href="{{ route('subscriptions.create') }}">Add New Subscription</a> <!-- Link to create a new subscription -->
    @if ($subscriptions->isEmpty())
        <p>No subscriptions found for this user.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Subscription Name</th>
                    <th>Price</th>
                    <th>Frequency</th> <!-- Changed column header to Frequency -->
                    <th>Due Date</th>
                    <th>Actions</th> <!-- Added column for action buttons -->
                </tr>
            </thead>
            <tbody>
                @foreach ($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->produk }}</td>
                        <td>{{ $subscription->harga }}</td>
                        <td>{{ $subscription->frequency ? $subscription->frequency->frequency : 'N/A' }}</td>
                        <td>{{ $subscription->due_date }}</td>
                        <td>
                            <!-- Add action buttons (edit, delete, open) here -->
                            <a href="{{ route('subscriptions.edit', $subscription->subscription_id) }}">Edit</a> | 
                            <form action="{{ route('subscriptions.destroy', $subscription->subscription_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form> 
                            <a href="{{ route('subscriptions.show', $subscription->subscription_id) }}">Open</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    

@endsection
