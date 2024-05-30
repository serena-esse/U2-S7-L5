<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'timetable_id',
        'status'
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function timetable(): BelongsTo {
        return $this->belongsTo(Timetable::class);
    }
}
