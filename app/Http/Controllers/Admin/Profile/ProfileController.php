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
        //use in blade 
        // $user->detail; $user->licenses;  $user->vehicles
        $vehicles = [
            'active' => $user->vehicles->filter(function ($vehicle) {
                return $vehicle->status == 1;
            }),
            'inactive' => $user->vehicles->filter(function ($vehicle) {
                return $vehicle->status == 0;
            }),
        ];
        return view('admin.profile', ['user' => $user, 'vehicles' => $vehicles]);
    }

    public function update(Request $request) {
        
    }
}
