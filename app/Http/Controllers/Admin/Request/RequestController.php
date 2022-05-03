<?php

namespace App\Http\Controllers\Admin\Request;

use App\Models\Vehicle;
use App\Models\Event;
use App\Models\UserLicense;
use App\Models\Renewal;
use App\Models\Notification;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index() 
    {
        $vehicles = Vehicle::whereStatus(2)->get();
        return view('admin.request', [
            'vehicles' => $vehicles,
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
            'license_count' => count($licenses)
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
        $vehicle->update([
            'status' => 1
        ]);
        return redirect()->back();
    }
    public function decline_vehicle(Vehicle $vehicle) 
    {
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
        $license->update([
            'status' => 1
        ]);
        return redirect()->back();
    }
    public function decline_license(UserLicense $license) 
    {
        $license->delete();
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
