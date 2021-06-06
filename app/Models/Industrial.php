<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industrial extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'industryName',
        'address',
        'invoiceMonth',
        'trip',
        'perTrip',
        'total1',
        'currentCharge',
        'netArreas',
        'total2',
        'amtWords'
    ];
}
