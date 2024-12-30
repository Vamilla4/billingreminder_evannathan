@extends('layouts.app')

@section('content')
    <h1>Payments for Subscription: {{ $subscription->produk }}</h1>

    <!-- Add Payment Button -->
    <a href="{{ route('payments.create', $subscription->subscription_id) }}" class="btn btn-primary">Add Payment</a>

    <br><br>

    @if ($payments->isEmpty())
        <p>No payments found for this subscription.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Proof</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td>{{ $payment->proof }}</td>
                        <td>
                            <!-- Edit and Delete buttons for each payment -->
                            <a href="{{ route('payments.edit', $payment->payment_id) }}">Edit</a> |
                            
                            <form action="{{ route('payments.destroy', $payment->payment_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
@endsection
