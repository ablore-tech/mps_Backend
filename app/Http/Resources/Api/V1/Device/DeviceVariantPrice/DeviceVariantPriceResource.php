<?php

namespace App\Http\Resources\Api\V1\Device\DeviceVariantPrice;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceVariantPriceResource extends JsonResource
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
            'id' => $this->id,
            'device_id' => $this->device_id,
            'variant_id' => $this->variant_id,
            'price' => $this->price,
            'device_uid' => $this->device_uid,
            'imei_number' => $this->imei_number,
            'photo' => $this->photo,
            'color' => $this->color,
            'special_offers' => $this->special_offers,
            'special_offers_2' => $this->special_offers_2,
            'specification' => $this->specification,
            'memory_size' => $this->variant->memory_size,
            'unit' => $this->variant->unit
        ];
    }
}
