<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
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

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('idea.index')
            ->with('success', 'Account created successfully !!');
    }
}
