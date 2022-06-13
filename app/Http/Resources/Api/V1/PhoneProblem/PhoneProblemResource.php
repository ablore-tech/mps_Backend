<?php

namespace App\Http\Resources\Api\V1\PhoneProblem;

use App\Http\Resources\Api\V1\PhoneProblem\PhoneProblemOption\PhoneProblemOptionCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneProblemResource extends JsonResource
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
            'description' => $this->Description,
            'options' => $this->phoneProblemOptions ? new PhoneProblemOptionCollection($this->phoneProblemOptions) : null
        ];
    }
}
