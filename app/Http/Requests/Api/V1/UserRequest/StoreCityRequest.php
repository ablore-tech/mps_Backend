<?php

namespace App\Http\Requests\Api\V1\UserRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCityRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required', Rule::exists('users', 'id')],
            'city_id' => ['required', Rule::exists('cities', 'id')]
        ];
    }
}
