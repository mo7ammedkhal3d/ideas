<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(CreateIdeaRequest $request)
    {
        $validated = $request->validated();

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

        $this->authorize('update',$idea);

        $editing = true;

        return view('ideas.show', compact('editing', 'idea'));
    }

    public function update(UpdateIdeaRequest $request ,idea $idea)
    {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        $this->authorize('update',$idea);

        $idea->update($request->validated());

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

        $this->authorize('delete',$idea);

        $idea->delete();

        return redirect()
            ->route('ideas.index')
            ->with('success', 'idea deleted successfully');
    }
}
