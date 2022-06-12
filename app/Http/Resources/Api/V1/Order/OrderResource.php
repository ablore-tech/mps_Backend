<?php

namespace App\Http\Resources\Api\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "id" => $this->id,
            "user" => $this->user_id,
            "device_id" => $this->device_id,
            "variant_id" => $this->variant_id,
            "phone_model_id" => $this->phone_model_id,
            "price" => $this->price
        ];
    }
}
