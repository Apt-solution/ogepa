<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class remmitance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount_to_pay',
        'month_due',
        'admin_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
