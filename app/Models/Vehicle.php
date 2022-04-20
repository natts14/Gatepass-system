<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_plate_number',
        'vehicle_registration_number',
        'vehicle_registration_expiry',
        'model',
        'type',
        'color',
        'documents'
    ];
}
    