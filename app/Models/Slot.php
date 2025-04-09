<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'start_time',
        'end_time',
        'type',
        'status',
        'number_of_appointments',
    ];
}
