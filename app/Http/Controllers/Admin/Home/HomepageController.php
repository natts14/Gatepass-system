<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\ParkingLogs;

class HomepageController extends Controller
{
    public function index() 
    {
        /* $parking_logs = ParkingLogs::with(['vehicle' => function($query) { //get vehicle relationshihp with logs
            $query->with('user'); //get user relationship with vehicle
        }])->get(); */
        $parking_logs = ParkingLogs::all();
        return view('admin.homepage', ['parking_logs' => $parking_logs]);
    }
}
