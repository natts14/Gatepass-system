<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'renewal_id', 'id');
    }

    public function license()
    {
        return $this->belongsTo(UserLicense::class, 'renewal_id', 'id');
    }

    public function notification()
    {
        return $this->hasOne(Notification::class, 'renewal_id', 'id');
    }
}
