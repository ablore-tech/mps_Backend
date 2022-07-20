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
        return $this->belongsTo(PhoneProblem::class);
    }

    public function phoneProblemOption()
    {
        return $this->belongsTo(PhoneProblemOption::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
