<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tourist_id',
        'experience_id',
        'booking_date',
        'scheduled_date',
        'total_amount',
        'payment_status'];

    protected $casts = [
        'booking_date' => 'datetime',
        'scheduled_date' => 'datetime',
    ];

    public function tourist()
    {
        return $this->belongsTo(User::class, 'tourist_id');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
