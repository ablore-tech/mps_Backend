<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneProblemOption extends Model
{
    use HasFactory;

    public function phoneProblem()
    {
        return $this->belongsToMany(PhoneProblem::class);
    }

    public function devicePhoneProblemPrices()
    {
        return $this->hasMany(DevicePhoneProblemPrice::class);
    }
}
