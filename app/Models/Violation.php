<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'violation_id',
        'specification',
        'amount'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'violation_id', 'vehicle_plate_number');
    }
}
