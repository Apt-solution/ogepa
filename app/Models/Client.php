<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'sub_client_type',
        'no_of_sub_client_type',
        'address',
        'enteredBy'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
