<?php

namespace App\Http\Requests\RentShop;

use Illuminate\Foundation\Http\FormRequest;

class CreateRentShopRequest extends FormRequest
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
        $type_menu = \getNameSubdomain();
        if($type_menu == "admin.")
        {
            return [
                'name' => 'required|max:255',
                'price' => 'required|numeric',
            ];
        }
        else
        {
           
        }
       
    }
    public function messages()
    {
        return [
            'name.required' => 'Thông tin danh mục còn trống ',
            'price.numeric' => "Giá tiền phải là số",
            'price.required' => "Giá tiền không được để trống"

       
        ];
    }
   
}
