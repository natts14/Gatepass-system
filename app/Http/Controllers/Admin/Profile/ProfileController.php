<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        return view('admin.profile', ['user' => $user]);
    }
}
