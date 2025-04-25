<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'department_id',
        'phone',
        'fee',
        'qualification',
        'image',
        'status',
        'available_days',
    ];
     

    protected $casts = [
        'available_days' => 'array',
        'qualification' => 'array',
        'status' => 'integer',
        
    ];
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLE = 2;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
