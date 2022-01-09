<?php

namespace App\Http\Requests\Camera;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCameraRequest extends FormRequest
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
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000|nullable',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được đ63 trống ',
            'price.required' => "Giá tiền không được để trống",
            "price.integer" => "Gía tiền phải là số",
            "category_id.required" => "Danh mục không được để trống",
            'image.mimes' => 'Hình ảnh không đúng định dạng',
            'image.max' => 'Hình ảnh không vượt quá 10000KB',

           


        ];
    }
}
