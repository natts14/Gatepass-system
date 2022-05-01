<?php

namespace App\Http\Controllers\Guard;

use App\Models\Violation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    public function report(Request $request) {
        $request->validate([
            'violation_id'=> 'required'
        ]);
        
        Violation::create([
            'violation_id' => $request->violation_id,
            'specification' => $request->specification ?? 'violation',
            'ammount' => $request->amount ?? 0
        ]);
        
        return redirect()->back()->with('success', 'violation posted!');
    }
}
