<?php

namespace App\Http\Requests\Customer\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'full_name' => 'required|max:255',
            'phone_number' => 'required|digits_between:9,11',
            'address' => 'required|max:255',
            'email' => 'email||nullable'
           
            
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' => 'Thông tin tên còn trống ',
            'phone_number.required' => 'Thông tin số điện  thoại còn trống',
            'address.required' => 'Thông tin địa chỉ còn trống',
            
        ];
    }
}
