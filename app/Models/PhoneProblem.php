<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneProblem extends Model
{
    use HasFactory;

    public function devicePhoneProblemPrices()
    {
        return $this->hasMany(DevicePhoneProblemPrice::class);
    }

    public function phoneProblemOptions()
    {
        return $this->hasMany(PhoneProblemOption::class);   
    }
}
