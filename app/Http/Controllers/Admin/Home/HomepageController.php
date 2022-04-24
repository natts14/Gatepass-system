<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\ParkingLogs;
use App\Models\ParkingLot;

class HomepageController extends Controller
{
    public function index(Request $request) 
    {
        if (isset($request->search)) {
            $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                $query->whereHas('detail', function($query) use ($request) {
                    //search 
                    $query->where('firstname', 'like', "%".$request->search."%")
                        ->orWhere('middlename', 'like', "%".$request->search."%")
                        ->orWhere('lastname', 'like', "%".$request->search."%");
                    });
                if (isset($request->category)) {
                    $query->where('category', $request->category);
                }
            })->where(function ($query) use ($request) {
                if (isset($request->date_logs)) {
                    $query->whereDate('login_date', '=', date($request->date_logs));
                }
            })->get();
        } else {
            $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                if (isset($request->category)) {
                    $query->where('category', $request->category);
                }
            })->where(function ($query) use ($request) {
                if (isset($request->date_logs)) {
                    $query->whereDate('login_date', '=', date($request->date_logs));
                }
            })->get();
        }

        if (isset($request->sortBy)) {
            $parking_logs = $parking_logs->sortBy($request->sortBy, SORT_NATURAL);
        }

        $parking_slots = ParkingLot::sum('capacity');
        $users_login = ParkingLogs::whereHas('user', function($query){
            $query->where('category', '!=', 'admin');
        })->where('logout_date', null)->count();
        $users_count = User::where('category', '!=', 'admin')->count();
        $visitors_login = ParkingLogs::whereHas('user', function($query) {
            $query->where('category', 'visitor');
        })->where('logout_date', null)->count();
        $visitors_count = User::where('category', 'visitor')->count();

        return view('develop.homepage', [
            'parking_logs' => $parking_logs, 
            'parking_slots' => $parking_slots,
            'users_login' => $users_login,
            'users_count' => $users_count,
            'visitors_login' => $visitors_login,
            'visitors_count' => $visitors_count
        ]);
    }
}
