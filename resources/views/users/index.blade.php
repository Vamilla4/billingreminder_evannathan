@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users</h1>
        
        <!-- Button to Add New User -->
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

        <!-- Users Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>user_id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->user_id }}</td>
                        <td>
                            <!-- Edit User Button -->
                            <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Delete User Button -->
                            <form action="{{ route('users.destroy', $user->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                            </form>

                            <!-- Open Button to View Subscriptions -->
                            <a href="{{ route('user.subscriptions', ['user_id' => $user->user_id]) }}" class="btn btn-info btn-sm">Open</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
