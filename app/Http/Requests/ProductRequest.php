<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => ['required','exists:categories,id'],
            'brand_id' => ['required','exists:brands,id'],
            'name' => ['required'],
            'slug' => ['required','unique:products,slug'],
            'number' => ['required','digits_between:1,999'],
            'image' => ['required','mimes:png,jpg'],
            'price' => ['required','regex:/^(\d+(\.\d*)?)|(\.\d+)$/'],
            'desc' => ['required']
        ];
    }
}
