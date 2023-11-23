<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function seens()
    {
        return $this->hasMany(Seen::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
