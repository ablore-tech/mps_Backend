<?php

namespace App\Http\Requests\Api\V1\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['email'],
            'alternate_number' => ['digits:10'],
            'name' => ['nullable']
        ];
    }
}
