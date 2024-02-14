<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class FeedController extends Controller
{
    public function __invoke(Request $request)
    {

        $followingsIds = auth()->user()->followings()->pluck('user_id');

        // $ideas = Idea::whereIn('user_id',$followingsIds)->latest();

        // if (request()->has('search')) {
        //     $ideas = $ideas->search(request('search',''));
        // }

        $ideas= Idea::when(request()->has('search'),function($query){
            $query->search(request('search',''));
        })->whereIn('user_id',$followingsIds)->latest()->paginate(5);

        return view('dashboard', ['ideas' => $ideas]);
    }
}
