<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() 
    {
        return view('admin.userpage');
    }

    public function create() 
    {
        return view('admin.user-add');
    }
}
