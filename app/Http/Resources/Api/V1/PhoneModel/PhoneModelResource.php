<?php

namespace App\Http\Resources\Api\V1\PhoneModel;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneModelResource extends JsonResource
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
            'brand_id' => $this->brand_id,
            'series_id' => $this->series_id,
            'name' => $this->name,
            'image' => $this->image,
            'description' => $this->description,
            'series_name' => $this->series->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
