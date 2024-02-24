<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index(){
        return redirect()->route('admin.users.index');
    }
}
