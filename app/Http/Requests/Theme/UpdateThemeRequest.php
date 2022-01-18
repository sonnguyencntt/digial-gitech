<?php

namespace App\Http\Requests\Theme;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThemeRequest extends FormRequest
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
   
            'email' => 'string|email|max:255|nullable',
            'hotline' => 'numeric|nullable'

        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email không đúng định dạng ',
            'hotline.numeric' => 'Số điện thoại không đúng định dạng ',

          

        ];
    }
}
