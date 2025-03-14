<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>

    <!-- Display the error message if it exists -->
    @if(session('error'))
        <div style="color: red; margin-top: 10px;">
            {{ session('error') }}
        </div>
    @endif
</form>
