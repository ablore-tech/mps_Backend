<?php

namespace App\Http\Resources\Api\V1\Device;

use App\Http\Resources\Api\V1\Device\DeviceVariantPrice\DeviceVariantPriceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
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
            'phone_model_id' => $this->phone_model_id,
            'name' => $this->name,
            'device_specification' => $this->device_specification,
            'device_variant_details' => new DeviceVariantPriceCollection($this->deviceVariantPrices)
        ];
    }
}
