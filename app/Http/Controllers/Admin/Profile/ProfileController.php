<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Models\UserDetail;
use App\Models\UserLicense;
use App\Models\Document;
use App\Models\Renewal;
use App\Models\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Requests\Auth\RegisterRequest;

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
        
        //user $notification->renewal to access renewal
        $notifications = Notification::whereUserId($user->id)->get(); 
        //pending renewals status = 1
        $transactions = Renewal::whereUserId($user->id)->whereStatus(1)->get();

        if ($user->category == 'guard' || $user->category == 'admin') {
            $view = $user->category;
        }else {
            $view = 'user';
        }
        return view($view.'.profile', ['user' => $user, 'vehicles' => $vehicles, 'transactions' => $transactions, 'notifications' => $notifications]);
    }

    public function update(Request $request, $profile) {
        $user = Auth::user();

        switch ($profile) {
            case 'personal':
                $request->validateWithBag('personal', [
                    'name'=> 'required',
                    'email' => 'required',
                    'firstname' => 'required',
                    'middlename' => 'required',
                    'lastname' => 'required',
                    'address' => 'required|min:3',
                    'contact_number' => 'required'
                ]);
                
                $user_data = [
                    'name' => request('name'),
                    'email' => request('email'),
                    'password' => request('password')
                ];
                $user->update(request('password') != '' ? $user_data : Arr::except($user_data, ['password']));

                $detail = UserDetail::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'firstname' => request('firstname'),
                        'middlename' => request('middlename'),
                        'lastname' => request('lastname'),
                        'address' => request('address'),
                        'contact_number' => request('contact_number')
                    ]
                );
                
                break;
            case 'license':
                request()->validateWithBag('license', [
                    'drivers_license_number'=> 'required',
                    'drivers_license_expiry' => 'required',
                    'license_type' => 'required'
                ]);

                $license = UserLicense::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'drivers_license_number' => request('drivers_license_number'),
                        'drivers_license_expiry' => request('drivers_license_expiry'),
                        'license_type' => request('license_type'),
                        'status' => $request->status ?? 2
                    ]
                );

                if (isset($request->document)) {
                    $request->validate([
                        'document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time().'.'.$request->document->extension(); 
        
                    $request->document->move(public_path('image/documents'), $imageName);
                    //save to table
                    Document::create([
                        'user_id' => $user->id,
                        'document_id' => $license->id,
                        'name' => $imageName,
                        'type' => 'license'
                    ]);
                }
                break;
            default:
                dd("something is wrong");
                break;
        }
        if ($user->category == 'guard' || $user->category == 'admin') {
            $view = $user->category;
        }else {
            $view = 'user';
        }
        return redirect()->back();
        
    }

}
