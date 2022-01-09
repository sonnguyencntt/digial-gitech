<?php

namespace App\Http\Requests\Internet;

use Illuminate\Foundation\Http\FormRequest;

class CreateInternetRequest extends FormRequest
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
            'name' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'category_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được đ63 trống ',
            'price.required' => "Giá tiền không được để trống",
            "price.integer" => "Gía tiền phải là số",
            "price.min" => "Gía tiền phải lớn hơn 0",
            "category_id.required" => "Danh mục không được để trống"

           


        ];
    }
}
