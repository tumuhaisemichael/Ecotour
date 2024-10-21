<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedExperience extends Model
{
    use HasFactory;

    protected $fillable = ['experience_id', 'reported_by', 'reason', 'status'];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
