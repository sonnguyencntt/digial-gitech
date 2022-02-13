<?php

namespace App\Http\Requests\Camera;

use Illuminate\Foundation\Http\FormRequest;

class CreateCameraRequest extends FormRequest
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
            'image_url' => 'mimes:jpeg,jpg,png,gif|max:10000|required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được đ63 trống ',
            'price.required' => "Giá tiền không được để trống",
            "price.integer" => "Gía tiền phải là số",
            "category_id.required" => "Danh mục không được để trống",
            'image_url.mimes' => 'Hình ảnh không đúng định dạng',
            'image_url.max' => 'Hình ảnh không vượt quá 10000KB',
            'image_url.required' => 'Vui lòng chọn ảnh',


           


        ];
    }
}
