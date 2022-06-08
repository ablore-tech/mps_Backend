<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceQuestionPrice extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsToMany(Question::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
