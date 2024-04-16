<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'name',
        'email',
        'password',
        'category',
        'expiration_date'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
    * Always encrypt the password when it is updated.
    *
    * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function parking_logs()
    {
        return $this->hasMany(ParkingLogs::class, 'user_id', 'id');
    }


    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'user_id', 'id');
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class,'user_id','id');
    }

    public function license()
    {
        return $this->hasOne(UserLicense::class,'user_id','id');
    }

    public function renewals()
    {
        return $this->hasMany(Renewal::class, 'user_id', 'id');
    }
}
