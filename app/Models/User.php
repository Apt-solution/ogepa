<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'location',
        'ogwama_ref',
        'phone',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function remmitance()
    {
        return $this->hasMany('App\Remmitance');
    }

    public function activity_log()
    {
        return $this->hasMany('App\Activity_log');
    }

    public function clientType()
    {
        return $this->belongsTo(ClientType::class, 'client_type', 'client_type');
    }

    public function clients()
    {
        return $this->hasMany('App\Client', 'id', 'entered_by');
    }


    

    
}
