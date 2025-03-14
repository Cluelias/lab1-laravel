<?php

namespace App\Http\Controllers;

use App\Models\User;  // Make sure to import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the intended page or default to '/notes'
            return redirect()->intended('/notes');
        }
        
        // If authentication fails, redirect back to the login page with an error message
        return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
    }
    
    

    public function register(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Ensure password confirmation field exists
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in after registration
        Auth::login($user);

        return redirect('/notes');
    }
}
