<?php

namespace App\Http\Requests;

use App\Models\Series;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePhoneModelRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'brand_id' => ['required', Rule::exists('brands', 'id')],
            'series_id' => ['nullable', Rule::exists('series', 'id')],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->series_id) {
                $series = Series::find($this->series_id);
                if($series->brand_id !== $this->brand_id){
                    $validator->errors()->add('series', 'This series does not belong to selected brand');
                }    
            }
        });
    }
}
