<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate(
            [
                'content' => 'required|min:8|max:240',
            ],
            [
                'content.required' => 'You are missing to enter an idea to post! 😒',
                'content.min' => 'The idea must contain at least 8 characters! 😊🥸',
                'content.max' => 'The idea text is too long! 😐 Please enter fewer characters.',
            ],
        );

        $idea = Idea::create(request()->all());
        // $idea = Idea::create(['content' => request()->get('content'), 'user_id' => 1]);

        return redirect()
            ->route('idea.index')
            ->with('success', 'Idea was created successfully');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;

        return view('ideas.show', compact('editing', 'idea'));
    }

    public function update(idea $idea)
    {
        request()->validate(
            [
                'content' => 'required|min:8|max:240',
            ],
            [
                'content.required' => 'You missing enter idea to post ?!!! 😒',
                'content.min' => 'The idea at leat must contain 8 charachters 😊🥸',
                'content.max' => 'The idea text is too long 😐 please enter less charachetrs',
            ],
        );

        $idea->content = request()->get('content', '');
        $idea->save();
        return redirect()
            ->route('idea.show', $idea->id)
            ->with('success', 'idea is updeated successfully');
    }

    public function destroy(idea $idae)
    {
        // idea::where('id',$idae_id)->firstOrFail()->delete();
        $idae->delete();

        return redirect()
            ->route('idea.index')
            ->with('success', 'idea deleted successfully');
    }
}
