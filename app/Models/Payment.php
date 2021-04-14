<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'amount',
        'bank_charges',
        'ref',
        'paystack_ref',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
