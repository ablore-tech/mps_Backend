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
            "user_name" => $this->user->name,
            "device_name" => $this->device ? $this->device->name : null,
            "variant" => $this->variant ? $this->variant->memory_size : null,
            "phone_model" => $this->phoneModel,
            "price" => $this->price,
            "status" => array_search($this->status, config('settings.status')) ? array_search($this->status, config('settings.status')) : 'Pending',
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "imei_number" => $this->imei,
            "image" => $this->image,
            "description" => $this->description
        ];
    }
}
