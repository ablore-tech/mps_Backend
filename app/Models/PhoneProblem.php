<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneProblem extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'craeted_at', 'updated_at'];

    public function devicePhoneProblemPrices()
    {
        return $this->hasMany(DevicePhoneProblemPrice::class);
    }

    public function phoneProblemOptions()
    {
        return $this->hasMany(PhoneProblemOption::class);   
    }

    public function phoneProblemResponses()
    {
        return $this->hasMany(PhoneProblemResponse::class);
    }
}
