<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\UserDetail;
use App\Models\ParkingLogs;
use App\Models\ParkingLot;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request) 
    {
        if (isset($request->search) || $request->search != '') {
            /* $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                $query->where('status', 1)
                    ->whereHas('detail', function($query) use ($request) {
                    //search 
                    $query->where('firstname', 'like', "%".$request->search."%")
                        ->orWhere('middlename', 'like', "%".$request->search."%")
                        ->orWhere('lastname', 'like', "%".$request->search."%");
                    });
                if (isset($request->category) || $request->category != '') {
                    $query->where('category', $request->category);
                }
            })->get(); */
            $users = User::where(function($query) use ($request) {
                    if (isset($request->category) || $request->category != '') {
                        $query->where('category', $request->category);
                    }
                })->whereHas('detail', function($query) use ($request) {
                    //search 
                    $query->where('firstname', 'like', "%".$request->search."%")
                        ->orWhere('middlename', 'like', "%".$request->search."%")
                        ->orWhere('lastname', 'like', "%".$request->search."%");
                })->get();
        } else {
            /* $parking_logs = ParkingLogs::whereHas('user', function($query) use ($request) {
                $query->where('status', 1);
                if (isset($request->category) || $request->category != '') {
                    $query->where('category', $request->category);
                }
            })->get(); */
            
            if (isset($request->sortBy) || $request->sortBy != '') {
                $users = User::where(function($query) use ($request) {
                    if (isset($request->category) || $request->category != '') {
                        $query->where('category', $request->category);
                    }
                })->get();
                if ($request->sortBy == 'asc') {
                    $users = $users->sortBy(function($query) use ($request) {
                        if (isset($query->detail)) {
                            return $query->detail->firstname;
                        }else {
                            return $query->name;
                        }
                    })->all();
                }else {
                    $users = $users->sortByDesc(function($query) use ($request) {
                        if (isset($query->detail)) {
                            return $query->detail->firstname;
                        }else {
                            return $query->name;
                        }
                    })->all();
                }
                /* $users->load(['detail', function($query) use ($request) {
                    $query->orderBy('firstname', $request->sortBy);
                }]); */
            } else {
                $users = User::where(function($query) use ($request) {
                    if (isset($request->category) || $request->category != '') {
                        $query->where('category', $request->category);
                    }
                })->get();
            }
        }

        $parking_slots = ParkingLot::sum('capacity');
        $users_login = ParkingLogs::whereHas('user', function($query){
            $query->where('status',1);
        })->where('logout_date', null)->count();
        $users_count = count($users);

        $visitors_login = ParkingLogs::whereHas('user', function($query) {
            $query->where('category', 'visitor')->where('status',1);
        })->where('logout_date', null)->count();
        $visitors_count = User::where('category', 'visitor')->where('status',1)->count();
        $vehicles = Vehicle::select('*')->get();
        
        foreach($users as $all_user){
            if($all_user->category=='student'||$all_user->category=='employee'||$all_user->category=='visitor'){
                foreach($vehicles as $vehicle){
                    if($vehicle->user_id ==$all_user->id){
                        $all_user->vehicle_plate_number=$vehicle->vehicle_plate_number;
                        $all_user->vehicle_registration_number=$vehicle->vehicle_registration_number;
                    }
                }
            }
        }


        return view('admin.userpage', [
            'users' => $users,
            // 'parking_logs' => $parking_logs, 
            'parking_slots' => $parking_slots,
            'users_login' => $users_login,
            'users_count' => $users_count,
            'visitors_login' => $visitors_login,
            'visitors_count' => $visitors_count,
            'request' => $request
        ]);
    }

    public function create_vehicle()
    {   
        $selectedUser=[];
        $users = User::select('*')->get();
        foreach($users as $user){
            if($user->category=='visitor'||$user->category=='student'||$user->category=='employee'){
                array_push($selectedUser,  $user);
            }
        }
        return view ('admin.user-add-vehicle',[
            'users'=> $selectedUser
        ]);
    }
    public function store_vehicle(Request $request)
    {
        $id =$request->input('user_id');
        $user =  User::find($id);
        request()->validate([
            'vehicle_plate_number'=> 'required',
            'vehicle_registration_number'=> 'required',
            'vehicle_registration_expiry'=> 'required',
            'model'=> 'required',
            'type'=> 'required',
            'color'=> 'required',
            'rfid' => 'required',
            //'user_id'=> 'required'
        ]);
      
        $user_vehicle = [
            'vehicle_plate_number' => request('vehicle_plate_number'),
            'vehicle_registration_number' => request('vehicle_registration_number'),
            'vehicle_registration_expiry' => request('vehicle_registration_expiry'),
            'model' => request('model'),
            'type' => request('type'),
            'color' => request('color'),
            'status' => 2,
            'rfid'=>request('rfid'),
            'user_id'=> request('user_id')
        ];
         $vehicle =  $user->vehicles()->create($user_vehicle);
        if (isset($request->vehicle_front)&&($request->vehicle_back)&&($request->vehicle_left)&&($request->vehicle_right)) {
            $request->validate([
               
                //'vehicle_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'vehicle_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'vehicle_back' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'vehicle_left' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'vehicle_right' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
         //   $imageName = time().rand(1,99).'.'.$request->vehicle_document->extension(); 
            $imageFront = time().rand(1,99).'.'.$request->vehicle_front->extension(); 
            $imageBack = time().rand(1,99).'.'.$request->vehicle_back->extension(); 
            $imageLeft = time().rand(1,99).'.'.$request->vehicle_left->extension(); 
            $imageRight = time().rand(1,99).'.'.$request->vehicle_right->extension(); 
    
           // $request->vehicle_document->move(public_path('image/documents'), $imageName);
            $request->vehicle_front->move(public_path('image/documents'), $imageFront);
            $request->vehicle_back->move(public_path('image/documents'), $imageBack);
            $request->vehicle_left->move(public_path('image/documents'), $imageLeft);
            $request->vehicle_right->move(public_path('image/documents'), $imageRight);
    
            //save to table
            Document::create([
                'user_id' => $vehicle->id,
                'document_id' => $vehicle->id,
             //   'name' => $imageName,
                'front'=>$imageFront,
                'back'=>$imageBack,
                'left'=>$imageLeft,
                'right'=>$imageRight,
                'type' => 'vehicle'
            ]);
        }
        return redirect('/admin-userpage');
    }

    public function create() 
    {
        return view('admin.user-add');
    }

    //register a user from admin page
    public function store(Request $request) {
        $next_year = date("Y-m-d", strtotime("+365 day"));
        request()->validate([
            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'category' => 'required',
            'firstname'=> 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact_number' => 'required'
                         
        ]);
      
        //create user in users table
        $user_data = [
            'name' => request('name'), //username
            'email' => request('email'),
            'password' => request('password'),
            'category' => request('category'),
            'status' => 1,
            'expiration_date'=>$next_year
         
        ];

        $user = User::create($user_data);
        //create users details
        $user_detail = [
            'firstname' => request('firstname'),
            'middlename' => request('middlename'),
            'lastname' => request('lastname'),
            'address' => request('address'),
            'contact_number' => request('contact_number'),

        ];
        $user->detail()->create($user_detail);
        //create drives license
        if (isset($request->drivers_license_number)) {
            $user_license = [
                'drivers_license_number' => request('drivers_license_number'),
                'drivers_license_expiry' => request('drivers_license_expiry'),
                'license_type' => request('license_type'),
                'status' => 2
            ];
            $license = $user->license()->create($user_license);
            if (isset($request->license_document)) {
                $request->validate([
                    'license_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->license_document->extension(); 
    
                $request->license_document->move(public_path('image/documents'), $imageName);
                //save to table
                Document::create([
                    'user_id' => $user->id,
                    'document_id' => $license->id,
                    'name' => $imageName,
                    'type' => 'license'
                ]);
            }
        }
        //create vehicles
        if (isset($request->vehicle_plate_number)) {
            $user_vehicle = [
                'vehicle_plate_number' => request('vehicle_plate_number'),
                'vehicle_registration_number' => request('vehicle_registration_number'),
                'vehicle_registration_expiry' => request('vehicle_registration_expiry'),
                'model' => request('model'),
                'type' => request('type'),
                'color' => request('color'),
                'rfid' => request('rfid'),
                'status' => 2
            ];
            $vehicle = $user->vehicles()->create($user_vehicle);
            if (isset($request->vehicle_front)&&($request->vehicle_back)&&($request->vehicle_left)&&($request->vehicle_right)) {
                $request->validate([
                   
                    //'vehicle_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'vehicle_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'vehicle_back' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'vehicle_left' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'vehicle_right' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
             //   $imageName = time().rand(1,99).'.'.$request->vehicle_document->extension(); 
                $imageFront = time().rand(1,99).'.'.$request->vehicle_front->extension(); 
                $imageBack = time().rand(1,99).'.'.$request->vehicle_back->extension(); 
                $imageLeft = time().rand(1,99).'.'.$request->vehicle_left->extension(); 
                $imageRight = time().rand(1,99).'.'.$request->vehicle_right->extension(); 
        
               // $request->vehicle_document->move(public_path('image/documents'), $imageName);
                $request->vehicle_front->move(public_path('image/documents'), $imageFront);
                $request->vehicle_back->move(public_path('image/documents'), $imageBack);
                $request->vehicle_left->move(public_path('image/documents'), $imageLeft);
                $request->vehicle_right->move(public_path('image/documents'), $imageRight);
        
                //save to table
                Document::create([
                    'user_id' => $user->id,
                    'document_id' => $vehicle->id,
                 //   'name' => $imageName,
                    'front'=>$imageFront,
                    'back'=>$imageBack,
                    'left'=>$imageLeft,
                    'right'=>$imageRight,
                    'type' => 'vehicle'
                ]);
            }
        }

        return redirect('/admin-userpage');
    }
}
