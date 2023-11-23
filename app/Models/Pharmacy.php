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

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class, "drug_pharmacy")
            ->withPivot("price")
            ->withTimestamps();
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
