<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['ideas' => idea::orderBy('created_at', 'DESC')->get()]);
    }
}
