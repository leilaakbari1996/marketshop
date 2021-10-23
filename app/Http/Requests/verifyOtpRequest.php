<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class verifyOtpRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'otp' => ['required','min:4','max:4','gte:1111','lte:9999']
        ];
    }
}
