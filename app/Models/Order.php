<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function questionResponses()
    {
        return $this->hasMany(QuestionResponse::class);
    }

    public function phoneProblemResponses()
    {
        return $this->hasMany(PhoneProblemResponse::class);
    }
}
