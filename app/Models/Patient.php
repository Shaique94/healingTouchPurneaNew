<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'gender',
        'address',
        'pincode',
        'city',
        'state',
        'country',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
