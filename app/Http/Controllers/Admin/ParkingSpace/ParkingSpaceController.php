<?php

namespace App\Http\Controllers\Admin\ParkingSpace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingLot;

class ParkingSpaceController extends Controller
{
    public function index() 
    {
        $parkings = ParkingLot::all();

        return view('admin.parking-space',['parkings'=>$parkings]);
    }

    public function create() 
    {
        return view('admin.parking-add');
    }

    public function store() 
    {
        request()->validate([
            'area_code'=> 'required',
            'capacity' => 'required',
            'parking_type' => 'required',
            'sensor_id' => 'required',
            'slot_color' => 'required'
        ]);
        ParkingLot::create([
            'area_code'=>request('area_code'),
            'capacity'=>request('capacity'),
            'parking_type'=>request('parking_type'),
            'sensor_id' => request ('sensor_id'),
            'slot_color' => request ('slot_color')
        ]);

        return redirect('/admin-parking-space');
    }

    public function edit(ParkingLot $parking) 
    {
        // return view('admin.parking-update',['parking' => $parking]);
        return view('develop.parking-update',['parking' => $parking]);
    }

    public function update(ParkingLot $parking)
    {
        request()->validate([
            'area_code'=> 'required',
            'capacity' => 'required',
            'parking_type' => 'required',
            'sensor_id' => 'required',
            'slot_color' => 'required'
        ]);

        $parking->update([
            'area_code'=> request('area_code'),
            'capacity'=> request('capacity'),
            'parking_type' => request('parking_type'),
            'sensor_id' => request ('sensor_id'),
            'slot_color' => request ('slot_color')
        ]);

        return redirect ('/admin-parking-space');
    }
    
    public function destroy(ParkingLot $parking) 
    {
        $parking->delete();

        return redirect('/admin-parking-space');
    }
}
