<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        // Return to user registration form
        return view('auth.register');
    }

    public function store()
    {
        // Validate the incoming request data
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required', Password::min(6), 'confirmed']
        ]);

        // Create a new user record with the validated data
        $user = User::create($attributes);

       // Log the newly registered user in
        Auth::login($user);

         // Redirect the user to the login page after successful registration
        return redirect('/');
    }
}
