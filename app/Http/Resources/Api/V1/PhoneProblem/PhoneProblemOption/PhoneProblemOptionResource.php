<?php

namespace App\Http\Resources\Api\V1\PhoneProblem\PhoneProblemOption;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneProblemOptionResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'device_id' => $this->devicePhoneProblemPrices ? $this->devicePhoneProblemPrices->first()->device_id : null,
            'price' => $this->devicePhoneProblemPrices ? $this->devicePhoneProblemPrices->first()->price : null,
        ];
    }
}
