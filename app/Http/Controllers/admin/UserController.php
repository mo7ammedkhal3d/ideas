<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index(){


        $users = User::latest()->paginate(5);


        return view('admin.users.index',compact('users'));
    }
}
