<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'confirmed|min:6|nullable',
            'email' => 'required|string|email|255|unique:users',
            'phone_number' => 'required|string|regex:/(01)[0-9]{9}/|255|unique:users'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống ',
            'password.confirmed' => "Nhập lại mật khẩu không đúng",
            'password.min' => "Mật khẩu phải ít nhất 6 kí tự"

            


        ];
    }
}
