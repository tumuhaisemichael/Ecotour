<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['host_id', 'plan', 'start_date', 'end_date', 'status'];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }
}
