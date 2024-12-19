<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Reminder</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="{{ url('/user') }}">Users</a></li>
        <li><a href="{{ url('/subscription') }}">Subscriptions</a></li>
        <li><a href="{{ url('/payment') }}">Payments</a></li>
        <li><a href="{{ url('/frequency') }}">Frequencies</a></li>
    </ul>
</nav>


    <div class="container">
        @yield('content')
    </div>
</body>
</html>