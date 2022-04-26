<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'drivers_license_number',
        'drivers_license_expiry',
        'license_type',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function renewal()
    {
        return $this->hasOne(Renewal::class, 'renewal_id', 'id')->where('type', 'license');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'document_id', 'id')->where('type', 'license');
    }
}
