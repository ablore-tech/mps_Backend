<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function phoneModel()
    {
       return $this->hasMany(PhoneModel::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
