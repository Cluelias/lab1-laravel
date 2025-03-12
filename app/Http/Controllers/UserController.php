<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}


public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

    return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
}
public function showRegistrationForm()
{
// Return the registration view
return view('auth.register'); // Adjust this view path based on your app
}
public function register(Request $request)
{
// Validate incoming data
$validated = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|min:8|confirmed', // Ensure 'password_confirmation' field is included
]);

// Create the user
$user = User::create([
'name' => $validated['name'],
'email' => $validated['email'],
'password' => Hash::make($validated['password']), // Hash password
]);

// Optionally, log the user in after registration
auth()->login($user);

// Redirect the user to a desired page, e.g., the home page
return redirect()->route('home'); // Update the route name as needed
}
}
