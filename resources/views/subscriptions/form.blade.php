@extends('layouts.app')

@section('content')
    <h1>Add New Subscription</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('subscriptions.store', ['user' => $user_id]) }}" method="POST">
        @csrf
        <div>
            <label for="produk">Subscription Name:</label>
            <input type="text" id="produk" name="produk" value="{{ old('produk') }}" required>
        </div>

        <div>
            <label for="harga">Price:</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required>
        </div>

        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}" required>
        </div>

        <div>
            <label for="frequency_id">Frequency:</label>
            <select id="frequency_id" name="frequency_id" required>
                <option value="">Select Frequency</option>
                @foreach ($frequencies as $frequency)
                    <option value="{{ $frequency->frequency_id }}" {{ old('frequency_id') == $frequency->frequency_id ? 'selected' : '' }}>
                        {{ $frequency->frequency }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Add Subscription</button>
    </form>
@endsection
