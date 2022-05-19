<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;


class RegisterController extends Controller
{
     /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) 
    {
        request()->validate([
            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);
      //create user in users table
         $user_data = [
          'name' => request('name'), //username
          'email' => request('email'),
          'password' => request('password'),
         'status' => 1
         ];
         $user = User::create($user_data);

    //create vehicles
    if (isset($request->vehicle_plate_number)) {
    $user_vehicle = [
        'vehicle_plate_number' => request('vehicle_plate_number'),
        'vehicle_registration_number' => request('vehicle_registration_number'),
        'vehicle_registration_expiry' => request('vehicle_registration_expiry'),
        'model' => request('model'),
        'type' => request('type'),
        'color' => request('color'),
        'rfid' => 2,
        'status' => 1
    ];
    $vehicle = $user->vehicles()->create($user_vehicle);
    if (isset($request->vehicle_document)) {
        $request->validate([
            'license_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vehicle_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->vehicle_document->extension(); 

        $request->vehicle_document->move(public_path('image/documents'), $imageName);
        //save to table
        Document::create([
            'user_id' => $user->id,
            'document_id' => $vehicle->id,
            'name' => $imageName,
            'type' => 'vehicle'
        ]);
    }
}

        // $user = User::create($request->validated());
        // $vehicle = Vehicle::create($request->validated());
        
        // auth()->login($user);

        return redirect('/login')->with('success', "Account successfully registered.");
    }
}
