@extends('layouts.app')

@section('content')
    <h1>Payments</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Subscription ID</th>
                <th>Payment Method</th>
                <th>Proof</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->subscription_id }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->proof }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
