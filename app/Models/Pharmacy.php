<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
