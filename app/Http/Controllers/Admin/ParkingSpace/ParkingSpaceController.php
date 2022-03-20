<?php

namespace App\Http\Controllers\Admin\ParkingSpace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParkingSpaceController extends Controller
{
    public function index() 
    {
        return view('admin.parking-space');
    }
}
