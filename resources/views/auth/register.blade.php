<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <input type="password" name="password" placeholder="Password">
    @error('password')
        <div>{{ $message }}</div>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    
    <button type="submit">Register</button>
</form>
