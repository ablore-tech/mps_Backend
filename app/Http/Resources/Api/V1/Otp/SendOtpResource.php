<?php

namespace App\Http\Resources\Api\V1\Otp;

use Illuminate\Http\Resources\Json\JsonResource;

class SendOtpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "phone_number" => $this->phone_number,
            "otp" => $this->otp,
            "otp_expires_time" => $this->otp_expires_time,
            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
            "id" => $this->id
        ];
    }
}
