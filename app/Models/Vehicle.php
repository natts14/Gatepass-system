<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_plate_number',
        'vehicle_registration_number',
        'vehicle_registration_expiry',
        'model',
        'type',
        'color',
        'status',
        'rfid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parking_Logs()
    {
        return $this->hasMany(ParkingLogs::class, 'vehicle_id', 'id');
    }

    public function renewal()
    {
        return $this->hasOne(Vehicle::class,'renewal_id','id')->where('type', 'vehicle');
    }

    public function document()
    {
        return $this->hasOne(Document::class, 'document_id', 'id')->where('type', 'vehicle');
    }

    public function violations()
    {
        return $this->hasMany(Violation::class, 'violation_id', 'vehicle_plate_number');
    }

}
    