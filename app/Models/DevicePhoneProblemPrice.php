<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevicePhoneProblemPrice extends Model
{
    use HasFactory;

    public function phoneProblem()
    {
        return $this->belongsToMany(PhoneProblem::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
