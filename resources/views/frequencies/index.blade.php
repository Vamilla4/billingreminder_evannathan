@extends('layouts.app')

@section('content')
    <h1>Frequencies</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($frequencies as $frequency)
                <tr>
                    <td>{{ $frequency->frequency }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
