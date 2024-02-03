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
                'idea-content' => 'required|min:8|max:240',
            ],
            [
                'idea-content.required' => 'You missing enter idea to post ?!!! 😒',
                'idea-content.min' => 'The idea at leat must contain 8 charachters 😊🥸',
                'idea-conent.max' => 'The idea text is too long 😐 please enter less charachetrs',
            ],
        );

        $idea = idea::create(['content' => request()->get('idea-content')]);

        return redirect()
            ->route('idea.index')
            ->with('success', 'Idea was created successuflly');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', ['idea' => $idea]);
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
