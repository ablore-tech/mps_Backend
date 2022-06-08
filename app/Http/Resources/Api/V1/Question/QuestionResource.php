<?php

namespace App\Http\Resources\Api\V1\Question;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'description' => $this->description,
            'price' => $this->deviceQuestionPrices->first() ? $this->deviceQuestionPrices->first()->price : null,
            'device_id' => $this->deviceQuestionPrices->first() ? $this->deviceQuestionPrices->first()->device_id : null
        ];
    }
}
