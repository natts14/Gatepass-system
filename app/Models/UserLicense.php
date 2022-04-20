<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'drivers_license_number',
        'drivers_license_expiry',
        'license_type',
        'documents',
    ];
}
