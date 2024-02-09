<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:5|max:50',
                'bio' => 'nullable|min:1|max:255',
                'image' => 'image',
            ],
            [
                'name.required' => 'please enter your name here 😊',
                'name.min:5' => 'enter name that have 5 charachter at least',
                'name.max:5' => 'the name is too long enter name have 50 charachter in max',
            ],
        );

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()
            ->route('profile', $user->id)
            ->with('success', 'Your profile updated successfuly');
    }

    public function profile(User $user)
    {
        return $this->show($user);
    }
}
