<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginWithOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone_number' => 'required|digits:10|numeric',
            'otp' => 'required|numeric|digits:4'
        ];
    }

    public function phoneNumber()
    {
        return $this->get('phone_number');
    }

    public function otp()
    {
        return $this->get('otp');
    }
}
