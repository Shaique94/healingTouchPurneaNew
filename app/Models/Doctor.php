<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
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
        'image_file_id',
        'status',
        'available_days',
        'slug',
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

    // Auto-generate slug on create/update
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doctor) {
            if (!$doctor->slug) {
                $userName = $doctor->user ? $doctor->user->name : 'doctor-' . ($doctor->user_id ?? 'unknown');
                $baseSlug = Str::slug($userName);
                $slug = $baseSlug;
                $counter = 1;

                while (self::withTrashed()->where('slug', $slug)->where('id', '!=', $doctor->id)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $doctor->slug = $slug;
            }
        });

        static::updating(function ($doctor) {
            if ($doctor->isDirty('user_id') || !$doctor->slug) {
                $userName = $doctor->user ? $doctor->user->name : 'doctor-' . ($doctor->user_id ?? 'unknown');
                $baseSlug = Str::slug($userName);
                $slug = $baseSlug;
                $counter = 1;

                while (self::withTrashed()->where('slug', $slug)->where('id', '!=', $doctor->id)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $doctor->slug = $slug;
            }
        });
    }
}
