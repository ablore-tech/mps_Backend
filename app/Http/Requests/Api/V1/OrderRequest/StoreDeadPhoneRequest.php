<?php

namespace App\Http\Requests\Api\V1\OrderRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeadPhoneRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
