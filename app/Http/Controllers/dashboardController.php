<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $ideas = idea::latest();

        // if (request()->has('search')) {
        //     $ideas = $ideas->search(request('search',''));
        // }

        $ideas= Idea::when(request()->has('search'),function($query){
            $query->search(request('search',''));
        })->latest()->paginate(5);

        return view('dashboard', compact('ideas'));
    }
}
