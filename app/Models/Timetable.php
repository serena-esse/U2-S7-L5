<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable= [
        'course_id',
        'days',
        'time',
        'available_places'
    ];

    public function bookings (): HasMany {
        return $this->hasMany(Booking::class);
    }
    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }
}
