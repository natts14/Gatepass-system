<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;

class HomepageController extends Controller
{
    public function index() 
    {
        $user = User::all();
        $vehicles['active'] = Vehicle::where(['user_id' => $user->id, 'status' => 1])->get();
        $vehicles['inactive'] = Vehicle::where(['user_id' => $user->id, 'status' => 0])->get();
        return view('admin.homepage', ['user' => $user, 'vehicles' => $vehicles]);
    }
}
