<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class dashboardController extends Controller
{
    public function index(){
        Log::info('Inside Admin dashboard Controller');

        return view('admin.dashboard');
    }

}
