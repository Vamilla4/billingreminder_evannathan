<form action="{{ route('users.update', $user->user_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" >
    </div>

    <div>
        <label for="login">Email:</label>
        <input type="email" name="login" id="login" value="{{ old('login', $user->login) }}" >
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" >
    </div>

    <button type="submit">Update</button>
</form>
