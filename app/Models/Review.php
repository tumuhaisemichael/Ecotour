<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['tourist_id', 'experience_id', 'rating', 'comment'];

    public function tourist()
    {
        return $this->belongsTo(User::class, 'tourist_id');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
