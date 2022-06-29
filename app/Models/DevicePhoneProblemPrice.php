<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevicePhoneProblemPrice extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function phoneProblem()
    {
        return $this->belongsToMany(PhoneProblemOption::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
