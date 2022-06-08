<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    
    public function deviceVariantPrices()
    {
        return $this->hasMany(DeviceVariantPrice::class);
    }

    public function deviceQuestionPrices()
    {
        return $this->hasMany(DeviceQuestionPrice::class);
    }
}
