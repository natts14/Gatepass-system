<?php

namespace App\Http\Controllers\Guard;

use App\Models\Violation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function report(Rrequest $request) {
        $request->validate([
            'violation_id'=> 'required'
        ]);
        
        Violation::create([
            'violation_id' => $requeset->violation_id,
            'specification' => $request->specification ?? 'violation',
            'ammount' => $request->amount ?? 0
        ]);
        
        return redirect()->back()->with('success', 'violation posted!');
    }
}
