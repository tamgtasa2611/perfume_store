<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeFormRequest extends FormRequest
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
            'size_name' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'size_name.required' => 'Size Name is required',
            'size_name.regex' => 'Size Name is not correct format',
        ];
    }
}
