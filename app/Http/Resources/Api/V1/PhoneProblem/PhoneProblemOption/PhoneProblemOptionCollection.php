<?php

namespace App\Http\Resources\Api\V1\PhoneProblem\PhoneProblemOption;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PhoneProblemOptionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($phoneProblemOption) {
            return new PhoneProblemOptionResource($phoneProblemOption);
        });
    }
}
