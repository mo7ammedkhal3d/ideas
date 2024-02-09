<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:5|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:5|max:50',
            ],
            [
                'name.required' => 'please enter your name here 😊',
                'name.min:5' => 'enter name that have 5 charachter at least',
                'name.max:5' => 'the name is too long enter name have 50 charachter in max',
                'email.required' => 'please enter your email here 😊',
                'email.email' => 'you enter not email format',
                'email.unique' => 'this email is already exisit for other user',
                'password.required' => 'please enter your password here 😊',
                'password.confirmed' => 'this password and confirmed password not mathched',
                'password.min' => 'the password must contain 5 charachter at least',
                'password.max' => 'the password is to long enater passord with 50 charachter in max',
            ],
        );

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
        }

        // Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('ideas.index')->with('success', 'Account created successfully !!');
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'please enter your email here 😊',
                'password.required' => 'please enter your password here 😊',
                'password.confirmed' => 'this password and confirmed password not mathched',
            ],
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('ideas.index')->with('success', 'Login successfully!');
        }

        return redirect()
            ->route('login')
            ->withErrors(['email' => 'email not matching emails with provide email and password']);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('ideas.index')->with('success', 'Logout successfuly!!');
    }
}
