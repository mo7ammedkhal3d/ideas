<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $idea = idea::create(['content' => request()->get('idea-content')]);

        return redirect()
            ->route('idea.index')
            ->with('success', 'Idea was created successuflly');
    }
}
