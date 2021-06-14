<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustrialRemmitance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount_to_pay',
        'no_of_trip',
        'month_due'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
