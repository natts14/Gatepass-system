<?php

namespace App\Http\Controllers\Admin\Request;

use App\Models\Vehicle;
use App\Models\Event;
use App\Models\UserLicense;
use App\Models\Renewal;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\Buksu_gatepass;
use App\Mail\buksugatepass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function index() 
    {
        $vehicles = Vehicle::whereStatus(2)->get();
        return view('admin.request', [
            'vehicles' => $vehicles,
            'user_count' => User::whereStatus(2)->count(),
            'vehicles_count' => count($vehicles),
            'renewals_count' => Renewal::whereType('vehicle')->whereStatus(1)->count(), 
            'events_count' => Event::whereStatus(0)->count(),
            'license_count' => UserLicense::whereStatus(2)->count()
        ]);
    }

    public function event() 
    {
        $events = Event::whereStatus(0)->get();
        return view('admin.request-event', [
            'events' => $events,
            'renewals_count' => Renewal::whereType('vehicle')->whereStatus(1)->count(), 
            'vehicles_count' => Vehicle::whereStatus(2)->count(),
            'events_count' => count($events),
            'user_count' => User::whereStatus(2)->count(),
            'license_count' => UserLicense::whereStatus(2)->count()
        ]);
    }

    public function license() 
    {
        $licenses = UserLicense::whereStatus(2)->get();
        return view('admin.request-license', [
            'licenses' => $licenses,
            'renewals_count' => Renewal::whereType('vehicle')->whereStatus(1)->count(), 
            'vehicles_count' => Vehicle::whereStatus(2)->count(),
            'events_count' => Event::whereStatus(0)->count(),
            'user_count' => User::whereStatus(2)->count(),
            'license_count' => count($licenses)
        ]);
    }

    public function visitor() 
    {
        $User = User::whereStatus(2)->get();
        $userLicense = UserLicense::select('*')->get();
        $userLicense = UserLicense::select('*')->get();
        $userDetails = UserDetail::select('*')->get();

        foreach($User as $usr){
            foreach($userLicense as $usrlicense){
                if($usr->id ==$usrlicense->user_id){
                    $usr->drivers_license_number=$usrlicense->drivers_license_number;
                    $usr->drivers_license_expiry=$usrlicense->drivers_license_expiry;
                    $usr->license_type=$usrlicense->license_type;
                }
            }
            foreach($userDetails as $userDetail){
                if($usr->id ==$userDetail->user_id){
                   $usr->firstname=$userDetail->firstname;
                   $usr->middlename=$userDetail->middlename;
                   $usr->lastname=$userDetail->lastname;
                   $usr->address=$userDetail->address;
                   $usr->contact_number=$userDetail->contact_number;
                }
            }
        }
        return view('admin.request-visitor', [
            'users' => $User,
            'renewals_count' => Renewal::whereType('vehicle')->whereStatus(1)->count(), 
            'vehicles_count' => Vehicle::whereStatus(2)->count(),
            'events_count' => Event::whereStatus(0)->count(),
            'license_count' => UserLicense::whereStatus(2)->count(),
            'user_count' => count($User)
        ]);
    }

    public function renewal() //vehicle renewal
    {
        $renewals = Renewal::whereType('vehicle')->whereStatus(1)->get();
        return view('admin.request-renewal', [
            'renewals' => $renewals, 
            'renewals_count' => count($renewals), 
            'vehicles_count' => Vehicle::whereStatus(2)->count(),
            'events_count' => Event::whereStatus(0)->count(),
            'license_count' => UserLicense::whereStatus(2)->count()
        ]);
    }

    public function approve_vehicle(Vehicle $vehicle) {
        $users = User::select('*')->get();
        foreach($users as $user){
            if($user->id == request('id')){
                $details = [
                    'subject' =>'BUKSU GATEPASS',
                    'title' =>'BUKSU GATEPASS',
                    'body' => 'You have successfully accepted!'
                ];
                Mail::to($user->email)->send(new Buksu_gatepass($details));
            }
        }
        $vehicle->update([
            'status' => 1
        ]);
        return redirect()->back();
    }
    public function decline_vehicle(Vehicle $vehicle) 
    {
        $users = User::select('*')->get();
        foreach($users as $user){
            if($user->id == request('id')){
                $details = [
                    'title' =>'BUKSU GATEPASS',
                    'body' => 'You have successfully decline!'
                ];
                Mail::to($user->email)->send(new buksugatepass($details));
            }
        }
        $vehicle->delete();

        return redirect()->back();
    }

    public function approve_event(Event $event) {
        $event->update([
            'status' => 1
        ]);
        return redirect(route('event.request'));
    }
    public function decline_event(Event $event) 
    {
        $event->delete();
        return redirect(route('event.request'));
    }

    public function approve_license(UserLicense $license) {
        $users = User::select('*')->get();
        foreach($users as $user){
            if($user->id == request('id')){
                $details = [
                    'subject' =>'BUKSU GATEPASS',
                    'title' =>'BUKSU GATEPASS',
                    'body' => 'You have successfully accepted!'
                ];
                Mail::to($user->email)->send(new Buksu_gatepass($details));
                $license->update([
                    'status' => 1
                ]);
                return redirect()->back();
            }
        }
        
    }
    public function decline_license(UserLicense $license) 
    {
        $users = User::select('*')->get();
        foreach($users as $user){
            if($user->id == request('id')){
                $details = [
                    'title' =>'BUKSU GATEPASS',
                    'body' => 'You have successfully decline!'
                ];
                Mail::to($user->email)->send(new buksugatepass($details));
                $license->delete();
                return redirect()->back();
            }
        }
        
    }

    public function approvevisitor(Request $request) {
        $users = User::select('*')->get();
        foreach($users as $user){
            if($user->id == request('id')){
                $details = [
                    'subject' =>'BUKSU GATEPASS',
                    'title' =>'BUKSU GATEPASS',
                    'body' => 'You have successfully accepted!'
                ];
                Mail::to($user->email)->send(new Buksu_gatepass($details));
                $user->status = 1;
                $user->update();
            }
        }
        return redirect()->back();
    }
    public function decline_visitor(User $user) 
    {
        $users = User::select('*')->get();
        $UserLicenses = UserLicense::select('*')->get();
        $Vehicles = Vehicle::select('*')->get();
        $UserDetails = UserDetail::select('*')->get();
        foreach($users as $user){
            if($user->id == request('id')){
                $details = [
                    'subject' =>'BUKSU GATEPASS',
                    'title' =>'BUKSU GATEPASS',
                    'body' => 'You have successfully decline!'
                ];
                Mail::to($user->email)->send(new buksugatepass($details));
                $user->delete();
            }
        }
        foreach($UserLicenses as $UserLicense){
            if($UserLicense->user_id == request('id')){
                $UserLicense->delete();
            }
        }
        foreach($Vehicles as $Vehicle){
            if($Vehicle->user_id == request('id')){
                $Vehicle->delete();
            }
        }
        foreach($UserDetails as $UserDetail){
            if($UserDetail->user_id == request('id')){
                $UserDetail->delete();
            }
        }
        return redirect()->back();
    }

    
    public function approve_renewal(Request $request, Renewal $renewal) {
        if ($renewal->type == 'license') {
            $user_license = UserLicense::find($renewal->user_id);
            if ($user_license != null) {
                $user_license->update([
                    'status' => 1
                ]);
            }
        }else {
            $vehicle = Vehicle::find($renewal->vehicle_id);
            if ($vehicle != null) {
                $vehicle->update([
                    'status' => 1
                ]);
            }
        }
        $renewal->update(['status' => 0]);
        Notification::create([
            'user_id' => $renewal->user_id,
            'admin_id' => Auth::user()->id,
            'renewal_id' => $renewal->id,
            'remarks' => $request->remarks ?? 'Approved'
        ]);
        return redirect()->back();
    }
    public function decline_renewal(Renewal $renewal) 
    {
        $renewal->delete();
        return redirect()->back();
    }
}
