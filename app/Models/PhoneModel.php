<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function device()
    {
        return $this->hasOne(Device::class);
    }
}
