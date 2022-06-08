<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceVariantPrice extends Model
{
    use HasFactory;

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
