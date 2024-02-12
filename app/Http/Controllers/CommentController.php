<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request ,Idea $idea){

        $validated = $request->validated();

        Comment::create(['content'=>$validated['content'],'idea_id'=>$idea->id , 'user_id'=>auth()->id()]);

        return redirect()->route('ideas.show',$idea->id)->with('success','Comment posted successfully');
    }
}
