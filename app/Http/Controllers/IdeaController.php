<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate(
            [
                'content' => 'required|min:8|max:240',
            ],
            [
                'content.required' => 'You are missing to enter an idea to post! 😒',
                'content.min' => 'The idea must contain at least 8 characters! 😊🥸',
                'content.max' => 'The idea text is too long! 😐 Please enter fewer characters.',
            ],
        );

        Idea::create(['content' => $validated['content'], 'user_id' => auth()->id()]);

        return redirect()
            ->route('ideas.index')
            ->with('success', 'Idea was created successfully');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        $this->authorize('idea.edit',$idea);

        $editing = true;

        return view('ideas.show', compact('editing', 'idea'));
    }

    public function update(idea $idea)
    {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        $this->authorize('idea.edit',$idea);

        $validated = request()->validate(
            [
                'content' => 'required|min:8|max:240',
            ],
            [
                'content.required' => 'You missing enter idea to post ?!!! 😒',
                'content.min' => 'The idea at leat must contain 8 charachters 😊🥸',
                'content.max' => 'The idea text is too long 😐 please enter less charachetrs',
            ],
        );

        $idea->update($validated);

        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'idea is updeated successfully');
    }

    public function destroy(idea $idea)
    {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }
        // idea::where('id',$idae_id)->firstOrFail()->delete();

        $this->authorize('idea.delete',$idea);

        $idea->delete();

        return redirect()
            ->route('ideas.index')
            ->with('success', 'idea deleted successfully');
    }
}
