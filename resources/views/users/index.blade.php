@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->password }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
