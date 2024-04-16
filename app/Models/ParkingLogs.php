<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'login_date',
        'login_time',
        'vehicle_id',
        'parking_id',
        'rfid'
    ];
    protected $guarded = [
        
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'parking_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parking_lot()
    {
        return $this->belongsTo(ParkingLot::class, 'parking_id', 'id');
    }

}
