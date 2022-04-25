<?php

namespace App\Http\Controllers\Admin\Request;

use App\Models\Vehicle;
use App\Models\Event;
use App\Models\UserLicense;
use App\Models\Renewal;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index() 
    {
        $vehicles = Vehicle::whereStatus(2)->get();
        return view('admin.request', ['vehicles' => $vehicles]);
    }

    public function event() 
    {
        $events = Event::whereStatus(2)->get();
        return view('admin.request-event', ['events' => $events]);
    }

    public function license() 
    {
        $licenses = UserLicense::whereStatus(2)->get();
        return view('admin.request-license', ['licenses' => $licenses]);
    }

    public function renewal() 
    {
        $renewals = Renewal::whereStatus(1)->get();
        return view('admin.request-renewal', ['renewals' => $renewals]);
    }

    public function approve_vehicle(Vehicle $vehicle) {
        $vehicle->update([
            'status' => 1
        ]);
        return redirect(route('admin.request'));
    }
    public function decline_vehicle(Vehicle $vehicle) 
    {
        $vehicle->delete();

        return redirect(route('admin.request'));
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
        return redirect(route('license.request'));
    }
    public function decline_license(UserLicense $license) 
    {
        $license->delete();
        return redirect(route('license.request'));
    }

    public function approve_renewal(Renewal $renewal) {
        $vehicle = Vehicle::find($renewal->vehicle_id);
        $vehicle->update([
            'status' => 1
        ]);
        RenewalTransactionHistory::create([
            'user_id' => Auth::user()->id,
            'renewal_id' => $renewal->id,
            'vehicle_id' => $vehicle->id
        ]);
        $renewal->update(['status' => 0]);
        return redirect(route('renewal.request'));
    }
    public function decline_renewal(Renewal $renewal) 
    {
        $renewal->delete();
        return redirect(route('renewal.request'));
    }
}
