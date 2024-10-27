<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'category',
        'location',
        'photo',
        'host_id',
        'available_dates',
        'status'];

    protected $casts = [
        'available_dates' => 'array'
    ];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
