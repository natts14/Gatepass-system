<?php

namespace App\Http\Controllers\Admin\ParkingSpace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingLot;
use App\Models\ParkingLogs;

class ParkingSpaceController extends Controller
{
    public function index() 
    {
        $parkings = ParkingLot::all();

        return view('admin.parking-space',['parkings'=>$parkings]);
    }


    public function store() 
    {
        request()->validate([
            'code'=> 'required'
        ]);
        ParkingLot::create([
            'area_code'=>request('area_code')
        ]);

        return redirect('/guard-homepage');
    }

}
