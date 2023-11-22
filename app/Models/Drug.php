<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function drugManufacturer()
    {
        return $this->belongsTo(DrugManufacturer::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

}
