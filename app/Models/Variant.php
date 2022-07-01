<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function deviceVariantPrices()
    {
        $this->hasMany(DeviceVariantPrice::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
