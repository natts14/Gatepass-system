<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\ParkingLogs;
use App\Models\ParkingLot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request) 
    {
        if (isset($request->search)) {
            $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                $query->where('status', 1)
                    ->whereHas('detail', function($query) use ($request) {
                    //search 
                    $query->where('firstname', 'like', "%".$request->search."%")
                        ->orWhere('middlename', 'like', "%".$request->search."%")
                        ->orWhere('lastname', 'like', "%".$request->search."%");
                    });
                if (isset($request->category)) {
                    $query->where('category', $request->category);
                }
            })->get();
        } else {
            $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                $query->where('status', 1);
                if (isset($request->category)) {
                    $query->where('category', $request->category);
                }
            })->get();
        }

        if (isset($request->sortBy)) {
            $parking_logs = $parking_logs->sortBy($request->sortBy, SORT_NATURAL);
        }

        $parking_slots = ParkingLot::sum('capacity');
        $users_login = ParkingLogs::whereHas('user', function($query){
            $query->where('status',1)->where('category', '!=', 'admin');
        })->where('logout_date', null)->count();
        $users_count = User::where('status',1)->where('category', '!=', 'admin')->count();
        $visitors_login = ParkingLogs::whereHas('user', function($query) {
            $query->where('category', 'visitor')->where('status',1);
        })->where('logout_date', null)->count();
        $visitors_count = User::where('category', 'visitor')->where('status',1)->count();

        // return view('admin.userpage', ['parking_logs' => $parking_logs]);
        return view('develop.userpage', [
            'parking_logs' => $parking_logs, 
            'parking_slots' => $parking_slots,
            'users_login' => $users_login,
            'users_count' => $users_count,
            'visitors_login' => $visitors_login,
            'visitors_count' => $visitors_count
        ]);
    }

    public function create() 
    {
        return view('admin.user-add');
    }
}
