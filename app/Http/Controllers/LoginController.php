<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function store(){
        // Validate the incoming request data
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to authenticate the user with the provided credentials
        if (! Auth::attempt($attributes)) {
            // If authentication fails, throw a validation exception with an error message
            throw ValidationException::withMessages([
                'password' => 'Sorry, those credentials do not match.'
            ]);
        }

        // Regenerate the session ID to prevent session fixation attacks
        request()->session()->regenerate();

        // Redirect the user to the dashboard after successful login
        return redirect('/dashboard');
    }

    public function destroy()
    {
        // Log the user out, invalidating their session
        Auth::logout();

        // Redirect the login page after logout
        return redirect('/');
    }
}
