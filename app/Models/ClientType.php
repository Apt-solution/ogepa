<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
    use HasFactory;
     protected $fillable = [
         'client_type',
         'sub_client_type',
         'monthly_payment',
     ];
}
