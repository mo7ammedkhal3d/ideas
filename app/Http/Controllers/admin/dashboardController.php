<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class dashboardController extends Controller
{
    public function index(){
        // Log::info('Inside Admin dashboard Controller');

        // if(!Gate::allows('admin')){
        //     abort(403);
        // }

        // if(Gate::denies('admin')){    // as  !allows
        //     abort(403);
        // }

        // $this->authorize('admin');   shortcut for above code or write it in route as middleware

        return view('admin.dashboard');
    }

}
