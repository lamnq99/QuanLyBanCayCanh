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
            'image' => 'required',
            'name' => 'required|string|max:255',
            'height' => 'required|numeric|min:1',
            'width' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'type' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được bỏ trống',
            'numeric' => 'Hãy nhập số',
            'min' => 'Nhập số lớn hơn 0'
        ];
    }
}
