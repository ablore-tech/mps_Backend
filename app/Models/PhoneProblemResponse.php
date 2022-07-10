<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneProblemResponse extends Model
{
    use HasFactory;

    public $guarded = ['id', 'created_at', 'updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function phoneProblem()
    {
        return $this->belongsTo(PhoneProblem::class);
    }
}
