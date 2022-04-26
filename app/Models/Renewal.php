<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'renewal_id', 'id');
    }

    public function license()
    {
        return $this->belongsTo(UserLicense::class, 'renewal_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'renewal_id', 'id');
    }
}
