<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'document_id', 'id');
    }

    public function license()
    {
        return $this->belongsTo(UserLicense::class, 'document_id', 'id');
    }
}
