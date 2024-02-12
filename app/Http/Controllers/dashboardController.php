<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $ideas = idea::latest();

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', ['ideas' => $ideas->paginate(5)]);
    }
}
