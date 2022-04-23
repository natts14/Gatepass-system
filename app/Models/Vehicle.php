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
        'documents'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parking_Logs()
    {
        return $this->hasMany(ParkingLogs::class, 'vehicle_id', 'id');
    }
}
    