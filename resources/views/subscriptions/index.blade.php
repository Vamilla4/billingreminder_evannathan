@extends('layouts.app')

@section('content')
    <h1>Subscriptions</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Due Date</th>
                <th>Frequency</th>
                <th>Payment Method</th>
                <th>User</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->produk }}</td>
                    <td>{{ $subscription->harga }}</td>
                    <td>{{ $subscription->due_date }}</td>
                    <td>{{ $subscription->frequency_id }}</td>
                    <td>{{ $subscription->payment_method }}</td>
                    <td>{{ $subscription->user_id }}</td>
                    <td>{{ $subscription->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
