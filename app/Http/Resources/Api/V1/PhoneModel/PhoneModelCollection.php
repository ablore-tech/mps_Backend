<?php

namespace App\Http\Resources\Api\V1\PhoneModel;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PhoneModelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($phoneModel) {
            return new PhoneModelResource($phoneModel);
        });
    }
}
