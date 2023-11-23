<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $casts = [
      "start_date" => "date",
        "end_date" => "date",
    ];

    public function drugManufacturer()
    {
        return $this->belongsTo(DrugManufacturer::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }
}
