<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;

    protected $fillable = [
        'parking_id',
        'area_code',
        'capacity',
        'parking_type',
        'sensor_id',
        'slot_color'
    ];
}
