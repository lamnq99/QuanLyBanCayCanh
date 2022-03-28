<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'number' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được bỏ trống',
            'numeric' => 'Hãy nhập số',
            'digits' => 'Cần 10 số trở lên',
            'email' => 'Định dạng email'
        ];
    }
}
