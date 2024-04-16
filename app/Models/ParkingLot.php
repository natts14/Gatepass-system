<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_code',
        'capacity',
        'parking_type',
        'sensor_id',
        'slot_color'
    ];

    public function parking_logs()
    {
        return $this->hasMany(ParkingLogs::class, 'parking_id', 'id');
    }
}
