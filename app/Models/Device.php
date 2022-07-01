<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function deviceVariantPrices()
    {
        return $this->hasMany(DeviceVariantPrice::class);
    }

    public function deviceQuestionPrices()
    {
        return $this->hasMany(DeviceQuestionPrice::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function phoneModel()
    {
        return $this->belongsTo(PhoneModel::class);
    }
}
