<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomepageController extends Controller
{
    public function index() 
    {
        $users = User::all();
        return view('admin.homepage', ['users' => $users]);
    }
}
