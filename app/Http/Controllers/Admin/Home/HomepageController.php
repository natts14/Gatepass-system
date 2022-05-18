<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Vehicle;
use App\Models\ParkingLogs;
use App\Models\ParkingLot;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(Request $request) 
    {
        $user = Auth::user();
        //check if user has access
        if ($user->category != 'admin' && $user->category != 'guard') {
            return redirect('user-profile');
        }

        if (isset($request->search) || $request->search != '') {
            $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                $query->whereHas('detail', function($query) use ($request) {
                    //search 
                    $query->where('firstname', 'like', "%".$request->search."%")
                        ->orWhere('middlename', 'like', "%".$request->search."%")
                        ->orWhere('lastname', 'like', "%".$request->search."%");
                    });
                if (isset($request->category) || $request->category != '') {
                    $query->where('category', $request->category);
                }
            })->where(function ($query) use ($request) {
                if (isset($request->date_logs)) {
                    $query->whereDate('login_date', '=', date($request->date_logs));
                }
            })->get();
        } else {
            $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                if (isset($request->category) || $request->category != '') {
                    $query->where('category', $request->category);
                }
            })->where(function ($query) use ($request) {
                if (isset($request->date_logs)) {
                    $query->whereDate('login_date', '=', date($request->date_logs));
                }else {
                    //default logs today
                    $query->whereDate('login_date', '=', now());
                }
            })->get();
        }

        if (isset($request->sortBy) || $request->sortBy != '') {
            $parking_logs = $parking_logs->sortBy($request->sortBy, SORT_NATURAL);
        }

        $parking_lots = ParkingLot::with(['parking_logs' => function ($query) { //all parking lots
            $query->where('logout_date', null); //logged per parking area
        }])->get();
        $parking_slots = $parking_lots->sum('capacity');//total parking capacity

        $users_login = ParkingLogs::where('logout_date', null)->count(); //all users login
        $users_count = User::count(); //all users count

        $visitors_login = ParkingLogs::whereHas('user', function($query) {
            $query->where('category', 'visitor');
        })->where('logout_date', null)->count();

        $visitors_count = User::where('category', 'visitor')->count();

        $todays_events = Event::whereDate('date_started_at', '=', now())->get(); //for guaards event

        $view = $user->category; //guard or admin view
        
        return view($view.'.homepage', [
            'user' => $user,
            'todays_events' => $todays_events,
            'parking_logs' => $parking_logs, 
            'parking_lots' => $parking_lots,
            'parking_slots' => $parking_slots,
            'users_login' => $users_login,
            'users_count' => $users_count,
            'visitors_login' => $visitors_login,
            'visitors_count' => $visitors_count,
            'request' => $request
        ]);
    }
    public function userEntrance(Request $request){
        $dt = Carbon::now()->toTimeString();
        $vehicle = Vehicle::select('*')->get();
      
        foreach($vehicle as $vehicles){
            if($vehicles->rfid == request('rfid')){
               ParkingLogs::create([
                   'rfid'=>request('rfid'),
                    'user_id'=>$vehicles->user_id,
                    'vehicle_is'=>$vehicles->id,
                    'parking_id'=>1,
                    'login_date'=> now(),
                     'login_time'=>$dt
                ]);
            }
        }
        return redirect('/guard-homepage'); 
   }
   public function visitourEntrance(Request $request){
    $dt = Carbon::now()->toTimeString();
    $vehicle = Vehicle::select('*')->get();
  
    foreach($vehicle as $vehicles){
        if($vehicles->id == request('id')){
           ParkingLogs::create([
               'rfid'=>request('rfid'),
                'user_id'=>$vehicles->user_id,
                'vehicle_is'=>$vehicles->id,
                'parking_id'=>1,
                'login_date'=> now(),
                 'login_time'=>$dt
            ]);
        }
    }
    return redirect('/guard-homepage'); 
}
}
