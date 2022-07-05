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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function phoneModel()
    {
        return $this->belongsTo(PhoneModel::class);
    }

    public function userChats()
    {
        return $this->hasMany(Chat::class);
    }
}
