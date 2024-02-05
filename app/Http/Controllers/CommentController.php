<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){

        request()->validate([
            'comment-text'=>'required'
        ],
        [
          'comment-text.required'=>'Commetn can\'t be embty 😒😐'
        ]
        );

        Comment::create(['content'=>request()->get('comment-text'),'idea_id'=>$idea->id , 'user_id'=>auth()->id()]);

        return redirect()->route('idea.show',$idea->id)->with('success','Comment posted successfully');
    }
}
