<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'appointment_id',
        'mode',
        'paid_amount',
        'settlement',
        'status',
    ];
}
