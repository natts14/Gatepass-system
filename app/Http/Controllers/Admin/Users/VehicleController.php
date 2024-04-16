<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Vehicle;
use App\Models\Renewal;
use App\Models\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function store(Request $request) {

        $user = Auth::user();

        request()->validate([
            'vehicle_plate_number'=> 'required',
            'vehicle_registration_number'=> 'required',
            'vehicle_registration_expiry'=> 'required',
            'model'=> 'required',
            'type'=> 'required',
            'color'=> 'required',
            'status'=> 'required'
        ]);

        $vehicle = $user->vehicle->create([
            'vehicle_plate_number' => request('vehicle_plate_number'),
            'vehicle_registration_number' => request('vehicle_registration_number'),
            'vehicle_registration_expiry' => request('vehicle_registration_expiry'),
            'model' => request('model'),
            'type' => request('type'),
            'color' => request('color'),
            'status' => 2
        ]);

        if (isset($request->document)) {
            $request->validateWithBag('document_vehicle', [
                'document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $document = Document::where(['document_id' => $vehicle->id, 'user_id' => $user->id, 'type' => 'vehicle'])->first();
            if ($document != null) {
                $request->file('document')->move(public_path('image/documents'), $document->name);//replace old uploaded file
            } else {
                $imageName = time().'.'.$request->document->extension(); 

                $request->document->move(public_path('image/documents'), $imageName);
                //save to table
                Document::create([
                    'user_id' => $user->id,
                    'document_id' => $vehicle->id,
                    'name' => $imageName,
                    'type' => 'vehicle'
                ]);
            }
        }

        return redirect(route('admin.profile.index'));
    }

    public function update(Request $request, Vehicle $vehicle) {
        request()->validate([
            'vehicle_plate_number'=> 'required',
            'vehicle_registration_number'=> 'required',
            'vehicle_registration_expiry'=> 'required',
            'model'=> 'required',
            'type'=> 'required',
            'color'=> 'required'
        ]);

        $vehicle->update([
            'vehicle_plate_number' => request('vehicle_plate_number'),
            'vehicle_registration_number' => request('vehicle_registration_number'),
            'vehicle_registration_expiry' => request('vehicle_registration_expiry'),
            'model' => request('model'),
            'type' => request('type'),
            'color' => request('color')
        ]);

        return redirect(route('admin.profile.index'));
    }

    public function renew(Vehicle $vehicle) {
        $vehicle->renewal()->create([
            'specification' => 'renewal'
        ]);
        return redirect(route('admin.profile.index'));
    }

    public function destroy(Vehicle $vehicle) 
    {
        $vehicle->delete();
        return redirect(route('admin.profile.index'));
    }
}
